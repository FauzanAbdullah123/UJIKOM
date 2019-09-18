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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('user', 'UserController');
    Route::resource('bidangstudi', 'BidangStudiController');
    Route::resource('kompetensikeahlian', 'KompetensiKeahlianController');
    Route::resource('guru', 'GuruController');
    Route::resource('siswa', 'SiswaController');
    Route::resource('walimurid', 'WaliMuridController');
    Route::resource('standarkompetensi', 'StandarKompetensiController');
    Route::resource('nilai', 'NilaiController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:guru']], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('nilai', 'NilaiController');
});