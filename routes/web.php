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

Route::get('/', function () {
    return view('welcome');
});
//List user
// Danh sach
Route::get("list","UserController@list")->name("list");
//Them
Route::get("new","UserController@getInsert")->name("insert");
Route::post("new","UserController@postInsert");
//Sua
Route::get("edit","UserController@getEdit")->name("edit");
Route::post("edit","UserController@postEdit");
//Xoa
Route::get("delete","UserController@delete");
//Xoa all 
Route::get("delete_all","UserController@delete_all");
//Search
Route::get("search","UserController@search");
//Data
Route::get("data","UserController@data");
//Phân trang
Route::get("paginate","UserController@paginate");
