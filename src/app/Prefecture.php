<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


// 基本的には1つのテーブルに1つのModel
class Prefecture extends Model
{
    protected $table = 'prefectures';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];



    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function findAllPrefectures()
    {
        return Prefecture::all();
    }


    //登録処理
    public function InsertTitle($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'name' => $request->name
        ]);
    }

    //更新処理
    public function updateTitle($request, $prefecture)
    {
        $result = $prefecture->fill([
            'name' => $request->name
        ])->save();
        //$prefecture->fill([])->save()で先ほど取得したレコード1件を更新する
        return $result;
    }

    //削除処理
    public function deleteTitle($id)
    {
        return $this->destroy($id);
        //delete() = 複数削除、destroy() = 単体削除
    }




    //設問のソート
    public function  sortSection($request, $prefecture)
    {
        $result = $prefecture->fill([
            'name' => $request->name
        ])->save();
        //$prefecture->fill([])->save()で先ほど取得したレコード1件を更新する
        return $result;
    }
};
