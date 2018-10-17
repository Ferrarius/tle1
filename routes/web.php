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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/possibilities', 'HomeController@possibilities')->name('possibilities');

Route::get('/user/input', 'UserInputController@edit')->name('user.input.edit');

Route::post('/user/input', 'UserInputController@update')->name('user.input.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/reports', 'UserReportController@index')->name('reports');
    Route::post('/reports', 'UserReportController@store')->name('report.store');
    Route::get('/reports/{report}', 'UserReportController@show')->name('report.show');
});

Route::get('/output', 'OutputController@index')->name('outputs');
