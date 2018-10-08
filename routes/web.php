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

Auth::routes(); 

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin|superadmin|member']],
function () {
// Route::get('/', 'AdminController@index')->name('home');
Route::resource('jurusan','JurusanController');
Route::resource('kelas','KelasController');
Route::resource('datasiswa','DatasiswaController');
Route::resource('pertanyaan','PertanyaanController');
Route::resource('jawaban','JawabanController');
Route::resource('dataadmin','DataadminController');

});
