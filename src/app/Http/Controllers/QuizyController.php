<?php

namespace App\Http\Controllers;
// 名前空間：クラスを階層的に整理するための仕組み


use App\Prefecture;
use App\Question;
use App\Choice;
use Illuminate\Http\Request;
// requestを使える状態にしている

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class QuizyController extends Controller
// クラスの定義,Controllerというクラスを継承
{ 
    // アクション：コントローラーに用意される処理
    // indexというメソッド追加
    // アクションメソッド：returnでHTMLソースコードを返す
    public function index($id){
        // {id}の値を受取るための引数$id
        // choices配列を用意→bladeで使うため
        
        // $prefecture = DB::table('prefectures')->where('id', $id)->first();
        //東京と広島でidが違う、1つに限定した値になる
        // $questions = DB::table('questions')->where('prefecture_id', $id)->get();
        // $choices = DB::table('choices')->get();
        $prefecture = Prefecture::with("questions.choices")->find($id);
        //子のリレーション.孫のリレーション
        // ②データを取得するときにwith関数を使う
        $choice = Choice::find($id);


        // $cond = ['prefecture_id' => $id, 'question_id' => $choice->question_id, 'valid' => 1];
        // $corrects =Prefecture::with("questions:id,prefecture_id","choices:id,question_id")->where($cond)->get();

        return view('quizyBlade.quizy',compact('prefecture','id'));
        // return view('quizyBlade.home',compact('prefecture','id'));
        // 第一引数：フォルダ.ファイル
        // 第二引数：変数を渡す、コンパクトでまとめる
        // viewの編集とcontorollerで定義した変数の名前が同じときにcompact関数でまとめる
    }

    public function login() {
        return view('quizyBlade.quizy');
    }

    public function create() {
        
    }
    
};

