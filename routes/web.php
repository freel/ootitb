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

Route::get('/test/{id?}', 'TestController@index')->name('test.index');
Route::get('/test/{id}/exam', 'TestController@exam')->name('test.exam');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@index')->name('admin.index');
  Route::resource('/test_group', 'TestGroupController', ['as'=>'admin']);
  Route::resource('/question', 'QuestionController', ['as'=>'admin']);
  Route::resource('/paper', 'PaperController', ['as'=>'admin']);
  Route::group(['prefix'=>'user_management', 'namespace'=>'UserManagement'], function(){
    Route::resource('/user', 'UserController', ['as'=>'admin.user_management']);
    Route::resource('/profession', 'ProfessionController', ['as'=>'admin.user_management']);
  });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
