<?php

namespace App\Http\Controllers;
// 名前空間：クラスを階層的に整理するための仕組み

use Illuminate\Http\Request;
// requestを使える状態にしている

class QuizyController extends Controller
// クラスの定義,Controllerというクラスを継承
{ 
    // アクション：コントローラーに用意される処理
    // indexというメソッド追加
    // アクションメソッド：returnでHTMLソースコードを返す
    public function index($id){
        // {id}の値を受取るための引数$id
        // choices配列を用意→bladeで使うため
        $choices = [
            1=>[
                1=>['たかなわ','たかわ','こうわ'],
                2=>['可めど','かめと','kameido'],
                3=>['こうじまち','おかとまち','かゆまち']
            ],
            2=>[
                1=>['むこうひだ','むかいなだ','むきひら'],
                2=>['おしらべ','みよし','みつぎ'],
                3=>['ぎやま','ぎんざん','かなやま']
            ]
            ];

        return view('quizyBlade.quizy',compact('id','choices'));
        // 第一引数：ファイル
        // 第二引数：変数を渡す、コンパクトでまとめる

    }
    
};

