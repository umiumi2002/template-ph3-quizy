<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Prefecture;
use App\Question;
use Illuminate\Http\Request;

use APP\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->prefecture = new Prefecture();
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
        $questions = Question::where('prefecture_id', $id)->orderBy('order_number','asc')->get();
        return view('admin.question', compact('prefecture', 'questions'));
    }

    //登録画面
    public function create_question($id,Request $request)
    {
        $prefecture = Prefecture::find($id);
        // $question = Question::where('prefecture_id', $id)->with("choices")->first();
        return view('admin.create_question',compact('prefecture'));
        //フォルダ／ファイル名.blade.php
    }

    //登録処理
    public function store_question(Request $request)
    {
        $registerQuestion = $this->question->InsertQuestion($request);
        return redirect()->route('admin.question');
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
    public function choice($id)
    {
        $choices = Choice::where('question_id', $id)->get();
        return view('admin.choice', compact('choices'));
    }
}
