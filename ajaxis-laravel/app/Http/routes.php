<?php
//use Ajaxis;
//use AjaxisGenerate;
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
/*App::bind('Ajaxis',function(){

	return new AjaxisGenerate();
});*/

//dd($k);        

Route::get('/','FriendController@index');
Route::get('friends/remove/{id}','FriendController@destroy');
Route::get('friends/edit/{id}','FriendController@edit');
Route::get('friends/create','FriendController@create');
Route::post('friends/store','FriendController@store');
Route::post('friends/update/{id}','FriendController@update');
Route::get('friends/delete/','FriendController@delete');
Route::get('friends/show/{id}','FriendController@show');
Route::get('tests',function(){
   
// $k = Ajaxis::createFormModal([['value' => '', 'name' => 'firstname', 'type' => 'text'], ['value' => '', 'name' => 'lastname', 'type' => 'text'], ['value' => '', 'name' => 'birthday', 'type' => 'date'], ['value' => '', 'name' => 'phone', 'type' => 'text'], ], '/friends/store/');  

});

