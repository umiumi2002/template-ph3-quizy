<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


// 基本的には1つのテーブルに1つのModel
class Prefecture extends Model{
    protected $table = 'prefectures';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];



    public function questions()
    {
        return $this -> hasMany('App\Question');
    }

    public function findAllPrefectures()
    {
        return Prefecture::all();
    }

    public function InsertTitle($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'name' => $request->name
        ]);
    }

    
};
