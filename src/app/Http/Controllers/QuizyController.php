<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizyController extends Controller
{ 
    public function index($id){
        $choices = [
            1=>[
                1=>['img','たかなわ','たかわ','こうわ'],
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
        // 第一引数：
        // 第二引数：

    }
    
};

