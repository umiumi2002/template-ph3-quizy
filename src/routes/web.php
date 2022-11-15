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
// ->name('home');: ルーティング名


//--------------管理画面---------------
//一覧表示
Route::get('/admin', 'AdminController@index')->name('admin.index');
// name で階層を付ける.

//追加画面
Route::get('/create','AdminController@create')->name('admin.create');

//追加処理
Route::post('/store','AdminController@store')->name('admin.store');

//編集画面
Route::get('/edit/{id}','AdminController@edit')->name('admin.edit');

//更新処理
Route::post('/update/{id}','AdminController@update')->name('admin.update');

//削除処理
Route::post('/destroy/{id}','AdminController@destroy')->name('admin.destroy');

//問題タイトルソート
Route::get('admin/prefecture/sort', 'AdminController@sort_prefecture')->name('admin.sort.prefecture');

//ソート更新
Route::post('/update_sortPrefecture','AdminController@savesort_prefecture')->name('admin.update.sortPrefecture');

//--------------- 設問管理---------------
//設問一覧
Route::get('/question/{id}','AdminController@question')->name('admin.question');

//設問追加
Route::get('/question/{id}/create_question','AdminController@create_question')->name('admin.create.question');

//追加処理
Route::post('/store_question','AdminController@store_question')->name('admin.store.question');


//設問編集
Route::get('/edit_question/{id}', 'AdminController@edit_question')->name('admin.edit.question');

//更新処理
Route::post('/update_question/{id}','AdminController@update_question')->name('admin.update.question');


//設問削除
Route::post('/destroy_question/{id}', 'AdminController@destroy_question')->name('admin.destroy.question');

//設問順番ソート
// Route::post('question/{id}', 'AdminController@sort_question')->name('admin.sort.question');

//ソート更新
Route::post('/update_sortQuestion','AdminController@savesort_question')->name('admin.update.sortQuestion');





//---------------選択肢一覧---------------
//選択肢一覧
Route::get('/choice/{prefecture_id}/{question_id}','AdminController@choice_index')->name('admin.choice');

//編集画面
Route::get('/edit_choice/{id}','AdminController@edit_choice')->name('admin.edit.choice');

//更新処理
Route::post('/update_choice/{id}','AdminController@update_choice')->name('admin.update.choice');













