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

Route::get('/test', function(){
    return "hoi";
})->name('home');

Route::get('/', 'PageController@home')->name('home');

Route::get('/reports/{report}', 'ReportController@show')->name('report.show')->middleware('can:view,report');

Route::post('/houses', 'HouseController@store')->name('house.store');
Route::get('/possibilities', 'HomeController@possibilities')->name('possibilities');

Route::middleware(['auth'])->group(function () {
    Route::get('/reports', 'UserHouseController@index')->name('reports');
    Route::get('/houses/{house}/reports/{report}', 'UserReportController@show')->name('report.show');
    Route::put('/houses/{house}/reports/{report}', 'UserReportController@update')->name('report.update');

    Route::get('/houses/{house}/reports/{report}/finish-output/{output}', 'UserReportController@finishOutput')->name('report.finish-output');

    Route::delete('/houses/{house}/reports/{report}', 'UserReportController@delete')->name('report.delete');
    Route::post('houses/{house}/reports/{report}', 'UserReportController@update')->name('report.update');
    Route::post('houses/{house}/reports', 'UserReportController@store')->name('report.store');

    Route::get('/houses/create', 'UserHouseController@create')->name('user.house.create');

    Route::post('/input', 'UserInputController@update')->name('user.input.update');

});

Route::get('/input', 'UserInputController@edit')->name('user.input.edit');