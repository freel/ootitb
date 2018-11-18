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

Route::get('/quiz/{id?}', 'QuizController@index')->name('quiz.index');
// Основное тестирование(на время + протокол)
Route::get('/quiz/{id}/exam', 'QuizController@exam_quiz')->name('exam.quiz');
Route::post('/quiz/{id}/exam/{paper_id}', 'QuizController@exam_quiz_check')->name('exam.answer');
// Пробное тестирование
Route::get('/quiz/{id}/try', 'QuizController@try_quiz')->name('try.quiz');
Route::post('/quiz/{id}/try/{paper_id}', 'QuizController@try_quiz_heck')->name('try.answer');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@index')->name('admin.index');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/question', 'QuestionController', ['as'=>'admin']);
  Route::post('/question/mass', 'QuestionController@massStore', ['as'=>'admin'])->name('admin.question.mass_store');
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
