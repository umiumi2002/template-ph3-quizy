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
        'prefecture_id'=>['integer'],
    ];
    
    public function choices()
    {
        return $this -> hasMany('App\Choice');
    }



  
}
