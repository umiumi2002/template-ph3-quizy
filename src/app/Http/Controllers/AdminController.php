<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Prefecture;
use App\Question;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use APP\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    //ページが読み込まれるたびにnew Prefecture()
    {
        $this->prefecture = new Prefecture();

        //$thisはprefectureのみ入る
    }

    //---------------問題タイトル---------------
    //一覧画面
    public function index()
    {
        $prefectures = Prefecture::orderBy('order_number', 'asc')->get();
        return view('admin.admin', compact('prefectures'));
    }

    //登録画面
    public function create(Request $request)
    {

        return view('admin.create');
    }

    //登録処理
    public function store(Request $request)
    {
        $registerTitle = $this->prefecture->InsertTitle($request);
        return redirect()->route('admin.index');
    }

    //編集画面
    public function edit($id)
    {
        $prefecture = Prefecture::find($id);

        return view('admin.edit', compact('prefecture'));
    }

    //更新処理
    public function update(Request $request, $id)
    {
        $prefecture = Prefecture::find($id);
        //record1件
        $updateTitle = $this->prefecture->updateTitle($request, $prefecture);
        //↑↑↑更新処理
        return redirect()->route('admin.index');
    }

    //削除処理
    public function destroy($id)
    {
        $deleteTitle = $this->prefecture->deleteTitle($id);
        return redirect()->route('admin.index');
    }

    //問題タイトルソート
    public function sort_prefecture(Request $request)
    {
        $prefectures = Prefecture::orderBy('order_number', 'asc')->get();
        return view('admin.sort_prefecture', compact('prefectures'));
    }

    //ソート更新
    public function savesort_prefecture(Request $request)
    {
        $lists = explode(',', $request->listIds);
        foreach ($lists as $index => $list) {
            $prefecture = Prefecture::find($list);
            $prefecture->order_number = $index;
            $prefecture->save();

            //listの順番変えたものをindexに代入して
            //要素としての数字を変えるのではなくindexの順番を要素に反映させる
        }
        return redirect()->route('admin.index');;
    }

    //---------------設問関連---------------
    //設問一覧画面
    public function question($id)
    {
        $prefecture = Prefecture::find($id);
        $questions = Question::where('prefecture_id', $id)->orderBy('order_number', 'asc')->get();
        return view('admin.question', compact('prefecture', 'questions'));
    }

    //登録画面
    public function create_question($id, Request $request)
    {
        $prefecture = Prefecture::find($id);
        $question = Question::where('prefecture_id', $id)->with("choices")->first();
        return view('admin.create_question', compact('prefecture', 'question'));
        //フォルダ／ファイル名.blade.php
    }

    //登録処理
    public function store_question(Request $request)
    {

        // ↓$requestでinputタグのnameをわざわざ送らなくても、questionインスタンスからprefecture_idにアクセスできるか
        $prefecture_id = $request->input('prefecture_id');

        // アップロードされたファイルの取得
        // $image = $request->file('image');
        // ファイルの保存とパスの取得
        // $path = isset($image) ? $image->store('image', 'public') : '';

        //画像処理
        if ($file = $request->image) {
            $fileName = $file->getClientOriginalName();
            $target_path = public_path('image/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        Question::create([
            'prefecture_id' => $prefecture_id,
            'order_number' => $request->order_number,
            'image' => $fileName,
        ]);
        // dd($request->order_number);
        // $registerQuestion = $this->question->InsertQuestion($request);
        return redirect()->route('admin.question', ['id' => $prefecture_id]);
    }

    //編集画面
    public function edit_question($id)
    {
        $question = Question::find($id);

        //※問題点：id=2の時に一覧画面戻るとかめいどなのに広島に戻る
        // →解決：prefecture_idを設定

        return view('admin.edit_question', compact('question'));
    }

    //更新処理
    public function update_question(Request $request, $id)
    {

        $dir = 'image';
        $question = Question::find($id);
        // 画像ファイルインスタンス取得
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir,$file_name);
        
        $question->update([
            'image' => $file_name,
        ]);

        return redirect()->route('admin.question', ['id' => $question->prefecture_id]);
    }



    public function destroy_question($id)
    {
        $question = Question::find($id);
        // $deleteImage = $question->image;
        // $pathdel = storage_path() . '/app/public/image/' . $deleteImage;
        // \File::delete($pathdel);
        $question->delete();
        return redirect()->route('admin.question', ['id' => $question->prefecture_id]);
    }



    //設問ソート
    public function sort_question(Request $request, $id)
    {
        $prefecture = Prefecture::find($id);
        //record1件
        $sortSection = $this->prefecture->sortSection($request, $prefecture);
        //↑↑↑更新処理
        return redirect()->route('admin.question');
    }

    //ソート更新
    public function savesort_question(Request $request)
    {
        $question_id = $request['question_id'];
        $question = Question::find($question_id);
        $question->order_number = $request['order_number'];
        $question->save();

        //listの順番変えたものをindexに代入して
        //要素としての数字を変えるのではなくindexの順番を要素に反映させる
        return redirect()->route('admin.question', ['id' => $question->prefecture_id]);
    }





    //---------------選択肢一覧表示---------------
    //選択肢一覧画面
    public function choice_index($prefecture_id, $question_id)
    {
        // dd($prefecture_id);
        // $prefecture = Question::find($id);
        $choices = Choice::where('question_id', $question_id)->get();
        return view('admin.choice', compact('choices', 'prefecture_id'));
    }

    //選択肢編集
    public function edit_choice($id)
    {

        $choice = Choice::find($id);
        // dd($choice);
        return view('admin.edit_choice', compact('choice'));
    }

    //更新処理
    public function update_choice(Request $request, $id)
    {
        $question = Question::find($id);
        $choice = Choice::find($id);

        //record1件
        $updateChoice = $choice->updateChoice($request, $choice);
        //↑↑↑更新処理
        return redirect()->route('admin.choice', ['prefecture_id' => $question->prefecture_id, 'question_id' => $choice->question_id]);
    }
}
