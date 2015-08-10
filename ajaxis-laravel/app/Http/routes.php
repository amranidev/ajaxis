<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('friends','FriendController@index');
Route::get('friends/remove/{id}','FriendController@destroy');
Route::get('friends/edit/{id}','FriendController@edit');
Route::get('friends/create','FriendController@create');
Route::post('friends/store','FriendController@store');
Route::post('friends/update/{id}','FriendController@update');
Route::get('friends/delete/','FriendController@delete');
Route::get('/', function () {
    return view('welcome');
});
