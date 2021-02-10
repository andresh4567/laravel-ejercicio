<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/Config', 'UserController@config')->name('config');
Route::post('/User/update', 'UserController@update')->name('user.update');
Route::get('/User/Avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/Image/Create', 'ImageController@create')->name('image.create');
Route::post('/Image/Save', 'ImageController@save')->name('image.save');
Route::get('/Image/File/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/Image/{id}', 'ImageController@detail')->name('image.detail');
Route::post('/Comment/Save', 'CommentsController@save')->name('comments.save');
Route::get('/Coment/Delete/{id}', 'CommentsController@delete')->name('comments.delete');
Route::get('/Like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/Dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/Likes', 'LikeController@index')->name('like.likes');