<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    
    public function choices()
    {
        return $this -> hasMany('App\Choice');
    }



  
}
