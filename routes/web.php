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

Auth::routes();

Route::group([
  'namespace' => 'Admin',
  'prefix' => 'admin',
  'middleware' => 'auth'
], function () {
  Route::get('/', 'AdminController@index');
  Route::resource('/form', 'FormController', ['except' => ['show']]);
  Route::get('/form/{slug}', 'FormController@show');
  Route::post('/form/{slug}/validate', 'FormController@validateAnswer');
  Route::resource('/area', 'AreaController');
});

Route::group([
  'namespace' => 'Site',
], function(){
  Route::resource('/', 'SiteController', ['only' => ['index']]);
  Route::resource('/form', 'FormController', ['only' => ['index']]);
  Route::get('/form/{slug}', 'FormController@show');
  Route::resource('/area', 'AreaController', ['only' => ['index']]);
  Route::get('/area/{slug}', 'AreaController@show');
});
