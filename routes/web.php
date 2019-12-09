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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',['uses'=>'IndexController@enter']);

// Route::get('/',function(){
// 	return view(env('THEME').'.layouts.site');
// });
// Route::get('/places',['uses'=>'IndexController@index','as'=>'home']);

// Route::get('places/show/{id}',['uses'=>'IndexController@show','as'=>'places.show']);

// Route::get('places/create',['uses'=>'IndexController@create','as'=>'places.create']);

// Route::get('places/edit/{id}',['uses'=>'IndexController@edit','as'=>'places.edit']);

// Route::post('places/store',['uses'=>'IndexController@store','as'=>'places.store']);

Route::post('photos/add',['uses'=>'IndexController@add','as'=>'photos.add']);

Route::prefix('places')->group(function(){

	Route::get('',['uses'=>'IndexController@index','as'=>'home']);

	Route::get('show/{id}',['uses'=>'IndexController@show','as'=>'places.show']);

	Route::get('create',['uses'=>'IndexController@create','as'=>'places.create']);

	Route::get('edit/{id}',['uses'=>'IndexController@edit','as'=>'places.edit']);

	Route::post('store',['uses'=>'IndexController@store','as'=>'places.store']);

});