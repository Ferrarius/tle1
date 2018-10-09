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

Route::middleware(['auth'])->group(function () {
    Route::get('/reports', 'UserReportController@index')->name('user.reports');
    Route::get('/reports/{report}', 'UserReportController@show')->name('user.report.show');
    Route::post('/reports', 'UserReportsController@store')->name('user.report.store');
    Route::delete('/reports/{report}', 'UserReportsController@delete')->name('user.report.delete');

    Route::post('/input', 'UserInputController@update')->name('user.input.update');
});

Route::get('/input', 'UserInputController@edit')->name('user.input.edit');