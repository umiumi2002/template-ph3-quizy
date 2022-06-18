<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \Illuminate\Support\Facades\Route;
Route::get('/quizy/{id?}','QuizyController@index');
// 第一引数：アクセスするアドレス
// ？は任意パラメータ
// 第二引数：呼び出すコントローラー@アクション
