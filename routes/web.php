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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/semester', 'UISemesterController@index');
Route::get('/semester/add', 'UISemesterController@add');
Route::get('/semester/view/{id?}', 'UISemesterController@view');
Route::get('/semester/edit/{id?}', 'UISemesterController@edit');

Route::get('level', 'UILevelController@index');

Route::get('santri', 'UISantriController@index');

Route::get('pengajar', 'UIPengajarController@index');

Route::get('kelas', 'UIKelasController@index');

Route::get('peserta', 'UIPesertaController@index');

Route::get('infaq', 'UIInfaqController@index');
