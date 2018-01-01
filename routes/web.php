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

Route::get('/level', 'UILevelController@index');
Route::get('/level/add', 'UILevelController@add');
Route::get('/level/view/{id?}', 'UILevelController@view');
Route::get('/level/edit/{id?}', 'UILevelController@edit');

Route::get('santri', 'UISantriController@index');
Route::get('/santri/add', 'UISantriController@add');
Route::get('/santri/view/{id?}', 'UISantriController@view');
Route::get('/santri/edit/{id?}', 'UISantriController@edit');

Route::get('pengajar', 'UIPengajarController@index');
Route::get('/pengajar/add', 'UIPengajarController@add');
Route::get('/pengajar/view/{id?}', 'UIPengajarController@view');
Route::get('/pengajar/edit/{id?}', 'UIPengajarController@edit');

Route::get('kelas', 'UIKelasController@index');
Route::get('/kelas/add', 'UIKelasController@add');
Route::get('/kelas/view/{id?}', 'UIKelasController@view');
Route::get('/kelas/edit/{id?}', 'UIKelasController@edit');

Route::get('peserta', 'UIPesertaController@index');

Route::get('infaq', 'UIInfaqController@index');
