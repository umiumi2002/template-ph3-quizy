<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    //選択肢更新処理
    public function updateChoice($request, $choice)
    {
        $result = $choice->fill([
            'name' => $request->name
        ])->save();
        return $result;
    }
}
