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

Route::get('/', 'SiteController@home');


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::get('/dashboard', 'DashboardController@index')->middleware(["auth","checkRole:admin,siswa"]);

Route::group(["prefix" => "/siswa","middleware"=>["auth","checkRole:admin"]], function () {
    Route::get('/', 'SiswaController@index');
    Route::post('/create', 'SiswaController@create');
    Route::get('/{siswa}/edit', 'SiswaController@edit');
    Route::get('/exportexcel', 'SiswaController@exportExcel');
    Route::get('/exportpdf', 'SiswaController@exportPdf');
    Route::post('/{siswa}/update', 'SiswaController@update');
    Route::get('/{siswa}/delete', 'SiswaController@delete');
    Route::get('/{siswa}/profile', 'SiswaController@profile');
    Route::post('/{siswa}/addnilai', 'SiswaController@addnilai');
    Route::get('/{siswa}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
});

Route::get('/guru/{id}/profile', 'GuruController@profile');
