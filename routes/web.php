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

Route::get('/frontend','ExamController@frontend')->name('exam.frontend');
Route::get('/upload','ExamController@upload')->name('exam.upload');
Route::post('/upload','ExamController@upload_file')->name('exam.upload_file');
Route::delete('/frontend/{id}','ExamController@destroy')->name('exam.destroy');
Route::delete('/deleteall','ExamController@deleteAll');

Auth::routes();





Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    Route::resource('electricity','ElectricityController');
    Route::resource('gass','GassController');

    Route::get('download_electricity/{id}','ElectricityController@download_electricity')->name('download_electricity');

    Route::get('download_gass/{id}','GassController@download_gass')->name('download_gass');

    /*Route::get('/file-upload/download/{file}', 'ElectricityController@download')->name('download_electricity_1');*/
});
