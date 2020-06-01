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

// トップページ
Route::get('/', function () {
    return view('welcome');
});

// 記事一覧ページ
Route::get('todos', 'TodosController@index');
// 記事詳細ページ
Route::get('todos/{todo}', 'TodosController@show');

// 記事投稿フォームページ
Route::get('new-todos', 'TodosController@create');
// 記事投稿
Route::post('store-todos', 'TodosController@store');

// 記事更新フォームページ
Route::get('todos/{todo}/edit', 'TodosController@edit');
// 記事更新
Route::post('todos/{todo}/update-todos', 'TodosController@update');

// 記事削除
Route::get('todos/{todo}/delete', 'TodosController@destroy');

// 記事既読
Route::get('todos/{todo}/complate', 'TodosController@complete');
