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

Route::get('/', 'PageController@home')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/reports', 'UserHouseController@index')->name('reports');
    Route::get('/houses/{house}/reports/{report}', 'ReportController@show')->name('report.show');

    Route::get('/houses/{house}/reports/{report}/finish-output/{output}', 'ReportController@finishOutput')->name('report.finish-output');

    Route::delete('/houses/{house}/reports/{report}', 'ReportController@delete')->name('report.delete');
    Route::post('houses/{house}/reports/{report}', 'ReportController@update')->name('report.update');
    Route::post('houses/{house}/reports', 'ReportController@store')->name('report.store');

    Route::post('/houses', 'UserHouseController@store')->name('user.house.store');
    Route::get('/houses/create', 'UserHouseController@create')->name('user.house.create');

    Route::post('/input', 'UserInputController@update')->name('user.input.update');
});

Route::get('/input', 'UserInputController@edit')->name('user.input.edit');