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

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'Admin\AdminController@index');
  Route::resource('/form', 'Admin\FormController', ['except' => [
    'show'
  ]]);
  Route::get('/form/{slug}', 'Admin\FormController@show');
  Route::post('/form/{slug}/validate', 'Admin\FormController@validateAnswer');
  Route::resource('/area', 'Admin\AreaController');
});

Route::resource('/', 'Site\SiteController', ['only' => [
  'index'
]]);
Route::resource('/form', 'Site\FormController', ['only' => [
  'index'
]]);
Route::get('/form/{slug}', 'Site\FormController@show');

Route::resource('/area', 'Site\AreaController', ['only' => [
  'index'
]]);
Route::get('/area/{slug}', 'Site\AreaController@show');
