<?php

Route::get('/', function(){
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/users/list/admin/page/sectity', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/user/userEdit', 'UserController@userEdit')->name('user.userEdit')->middleware('auth');
Route::post('/user/userEdit', 'UserController@userUpdate')->name('user.userUpdate')->middleware('auth');
Route::get('user/api/json', 'UserController@json')->name('user.json');

Route::resource('/post', 'PostController')->middleware('auth');
Route::get('post/api/json', 'PostController@json')->name('post.json');