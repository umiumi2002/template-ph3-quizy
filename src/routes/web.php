<?php
Route::get('/', function(){return view ('welcome');
});
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
Route::get('/route', function() {
  return view('quizyBlade.route');
});

Route::get('/quizy/{id?}','QuizyController@index')->name('quizy');

// ルータ－↑変更したときにブレードも変える必要性→名前付きルート：変更時にweb.phpのrouteを書き換えるのみ

// 第一引数：アクセスするアドレス
// ？は任意パラメータ
// 第二引数：呼び出すコントローラー@アクション

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
