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
        $prefectures = $this->prefecture->findAllPrefectures();
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
        $orderIds = explode(',', $request->listIds);
        foreach ($orderIds as $key => $orderId) {
            $prefecture = Prefecture::find($orderId);
            $prefecture->id = $key + 1;
            $prefecture->save();
        }
        return redirect()->route('admin.index');
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
        return view('admin.create_question', compact('prefecture','question'));
        //フォルダ／ファイル名.blade.php
    }

    //登録処理
    public function store_question(Request $request)
    {

        // ↓$requestでinputタグのnameをわざわざ送らなくても、questionインスタンスからprefecture_idにアクセスできるか
        $prefecture_id = $request -> input('prefecture_id');


        
        dd($prefecture_id);
        // ↑↑↑そもそもnull




        // アップロードされたファイルの取得
        $image = $request->file('image');
        // ファイルの保存とパスの取得
        $path = isset($image) ? $image->store('img', 'public') : '';
        
        Question::create([
            'prefecture_id' => $prefecture_id,
            'order_number'=> $request->order_number,
            'image' => $path,
        ]);
        dd($request->order_number);
        // $registerQuestion = $this->question->InsertQuestion($request);
        return redirect()->route('admin.question');
    }

    //編集画面
    public function edit_question($id)
    {
        $prefecture = Prefecture::find($id);
        $question = Question::find($id);

        //※問題点：id=2の時に一覧画面戻るとかめいどなのに広島に戻る
        // →解決：prefecture_idを設定

        return view('admin.edit_question', compact('prefecture', 'question'));
    }

    //更新処理
    public function update_question(Request $request, $id)
    {

        $question = Question::find($id);

        $image = $request->file('question');
        // 現在の画像へのパスをセット
        $image_path = $question->image;
        if (isset($image)) {
            // 現在の画像ファイルの削除
            Storage::disk('public')->delete($image_path);
            // 選択された画像ファイルを保存してパスをセット
            $image_path = $image->store('public/temp');
            // ファイル名は$temp_pathから"public/temp/"を除いたもの
            $filename = str_replace('public/temp/', '', $image_path);
            // データベースを更新
            $question->update([
                'image' => $filename,
            ]);
        }
        //↑↑↑更新処理
        return redirect()->route('admin.question',['id' => $question->prefecture_id]);
    }




    //設問ソート
    public function sort_question($request, $id)
    {
        $prefecture = Prefecture::find($id);
        //record1件
        $sortSection = $this->prefecture->sortSection($request, $prefecture);
        //↑↑↑更新処理
        return redirect()->route('admin.question');
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
        $choice = Choice::find($id);

        // dd($this);

        //record1件
        $updateChoice = $choice->updateChoice($request, $choice);
        //↑↑↑更新処理
        return redirect()->route('admin.choice');
    }
}
