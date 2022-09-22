<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// 基本的には1つのテーブルに1つのModel
class Prefecture extends Model{
    protected $table = 'prefectures';
    public function questions()
    {
        return $this -> hasMany('App\Question');
    }
    
};
