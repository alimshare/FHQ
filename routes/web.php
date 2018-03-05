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

Auth::routes(); // comments registration 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/master', 'HomeController@master');

/* SEMESTER */
Route::get('/semester', 'UISemesterController@index');
Route::get('/semester/add', 'UISemesterController@add');
Route::get('/semester/view/{id?}', 'UISemesterController@view');
Route::get('/semester/edit/{id?}', 'UISemesterController@edit');
Route::get('semester/export', 'UISemesterController@export');
Route::get('semester/datatables', 'UISemesterController@datatables');

/* LEVEL */
Route::get('/level', 'UILevelController@index');
Route::get('/level/add', 'UILevelController@add');
Route::get('/level/view/{id?}', 'UILevelController@view');
Route::get('/level/edit/{id?}', 'UILevelController@edit');
Route::get('level/export', 'UILevelController@export');
Route::get('level/datatables', 'UILevelController@datatables');

/* SANTRI */
Route::get('santri', 'UISantriController@index');
Route::get('/santri/add', 'UISantriController@add');
Route::get('/santri/view/{id?}', 'UISantriController@view');
Route::get('/santri/edit/{id?}', 'UISantriController@edit');
Route::get('santri/export', 'UISantriController@export');
Route::get('santri/datatables', 'UISantriController@datatables');

/* PENGAJAR */
Route::get('pengajar', 'UIPengajarController@index');
Route::get('/pengajar/add', 'UIPengajarController@add');
Route::get('/pengajar/view/{id?}', 'UIPengajarController@view');
Route::get('/pengajar/edit/{id?}', 'UIPengajarController@edit');
Route::get('pengajar/export', 'UIPengajarController@export');
Route::get('pengajar/datatables', 'UIPengajarController@datatables');

/* KELAS */
Route::get('kelas', 'UIKelasController@index');
Route::get('/kelas/add', 'UIKelasController@add');
Route::get('/kelas/view/{id?}', 'UIKelasController@view');
Route::get('/kelas/edit/{id?}', 'UIKelasController@edit');
Route::get('kelas/export', 'UIKelasController@export');
Route::get('kelas/datatables', 'UIKelasController@datatables');

/* PESERTA */
Route::get('peserta', 'UIPesertaController@index');
Route::get('/peserta/add', 'UIPesertaController@add');
Route::get('/peserta/view/{id?}', 'UIPesertaController@view');
Route::get('/peserta/edit/{id?}', 'UIPesertaController@edit');
Route::get('peserta/export', 'UIPesertaController@export');
Route::get('peserta/datatables', 'UIPesertaController@datatables');

/* INFAQ */
Route::get('infaq', 'UIInfaqController@index');
Route::get('/infaq/add', 'UIInfaqController@add');
Route::get('/infaq/view/{id?}', 'UIInfaqController@view');
Route::get('/infaq/edit/{id?}', 'UIInfaqController@edit');
Route::get('infaq/export', 'UIInfaqController@export');
Route::get('infaq/datatables', 'UIInfaqController@datatables');

/* SARAN */
Route::get('saran', 'UISaranController@index');
Route::get('/saran/add', 'UISaranController@add');
Route::get('/saran/view/{id?}', 'UISaranController@view');
Route::get('/saran/edit/{id?}', 'UISaranController@edit');
Route::get('saran/export', 'UISaranController@export');
Route::get('saran/datatables', 'UISaranController@datatables');
Route::get('/saran/jawab/{id?}', 'UISaranController@jawab');

/* TESTIMONI */
Route::get('testimoni', 'UITestimoniController@index');
Route::get('/testimoni/add', 'UITestimoniController@add');
Route::get('/testimoni/view/{id?}', 'UITestimoniController@view');
// Route::get('/testimoni/edit/{id?}', 'UITestimoniController@edit');
Route::get('testimoni/export', 'UITestimoniController@export');
Route::get('testimoni/datatables', 'UITestimoniController@datatables');

/* BUKU */
Route::get('/buku', 'UIBukuController@index');
Route::get('/buku/add', 'UIBukuController@add');
Route::get('/buku/view/{id?}', 'UIBukuController@view');
Route::get('/buku/edit/{id?}', 'UIBukuController@edit');
Route::get('buku/export', 'UIBukuController@export');
Route::get('buku/datatables', 'UIBukuController@datatables');

/* USER */
Route::get('user', 'UIUserController@index');
Route::get('user/add', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('user/add', 'Auth\RegisterController@register');
Route::get('user/view/{id?}', 'UIUserController@view');
Route::get('user/edit/{id?}', 'UIUserController@edit');
Route::post('user/edit/{id?}', 'UIUserController@update');
Route::post('user/remove', 'UIUserController@remove');
Route::get('user/export', 'UIUserController@export');
Route::get('user/datatables', 'UIUserController@datatables');
Route::post('user/reset_password', 'UIUserController@reset_password');

/* PEMBELIAN */
Route::get('pembelian', 'UIPembelianController@index');
Route::get('pembelian/add', 'UIPembelianController@add');
Route::post('pembelian/add', 'UIPembelianController@save');
Route::get('pembelian/view/{id?}', 'UIPembelianController@view');
Route::get('pembelian/export', 'UIPembelianController@export');
Route::get('pembelian/datatables', 'UIPembelianController@datatables');
