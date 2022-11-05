<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    public $timestamps = false;

    protected $fillable = [
        'image',
        'order_number',
        'prefecture_id',
    ];

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    //更新処理
    public function updateQuestion($request, $question)
    {
        $result = $question->fill([
            'image' => $request->image
        ])->save();
        //$prefecture->fill([])->save()で先ほど取得したレコード1件を更新する
        return $result;
    }
}
