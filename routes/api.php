<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* SANTRI */
Route::get('santri','Api\SantriController@index');
Route::get('santri/{id?}','Api\SantriController@show');
Route::post('santri/add','Api\SantriController@store');
Route::put('santri/update/{id?}','Api\SantriController@update');
Route::delete('santri/remove/{id?}','Api\SantriController@destroy');

/* PENGAJAR */
Route::get('pengajar','Api\PengajarController@index');
Route::get('pengajar/{id?}','Api\PengajarController@show');
Route::post('pengajar/add','Api\PengajarController@store');
Route::put('pengajar/update/{id?}','Api\PengajarController@update');
Route::delete('pengajar/remove/{id?}','Api\PengajarController@destroy');

/* PESERTA */
Route::get('peserta/nis/{nis?}','Api\PesertaController@getPesertaByNIS');
Route::get('peserta','Api\PesertaController@index');
Route::get('peserta/{id?}','Api\PesertaController@show');
Route::post('peserta/add','Api\PesertaController@store');
Route::put('peserta/update/{id?}','Api\PesertaController@update');
Route::delete('peserta/remove/{id?}','Api\PesertaController@destroy');

/* SEMESTER */
Route::get('semester','Api\SemesterController@index');
Route::get('semester/{id?}','Api\SemesterController@show');
Route::post('semester/add','Api\SemesterController@store');
Route::put('semester/update/{id?}','Api\SemesterController@update');
Route::delete('semester/remove/{id?}','Api\SemesterController@destroy');

/* LEVEL */
Route::get('level','Api\LevelController@index');
Route::get('level/{id?}','Api\LevelController@show');
Route::post('level/add','Api\LevelController@store');
Route::put('level/update/{id?}','Api\LevelController@update');
Route::delete('level/remove/{id?}','Api\LevelController@destroy');

/* KELAS */
Route::get('kelas/detail','Api\KelasController@detail');
Route::get('kelas','Api\KelasController@index');
Route::get('kelas/{id?}','Api\KelasController@show');
Route::post('kelas/add','Api\KelasController@store');
Route::put('kelas/update/{id?}','Api\KelasController@update');
Route::delete('kelas/remove/{id?}','Api\KelasController@destroy');

/* INFAQ */
Route::get('infaq','Api\InfaqController@index');
Route::get('infaq/{id?}','Api\InfaqController@show');
Route::post('infaq/add','Api\InfaqController@store');
// Route::delete('infaq/remove/{id?}','Api\InfaqController@destroy');

/* SARAN */
Route::get('saran','Api\SaranController@index');
Route::get('saran/{id?}','Api\SaranController@show');
Route::post('saran/add','Api\SaranController@store');
Route::put('saran/update/{id?}','Api\SaranController@update');
Route::delete('saran/remove/{id?}','Api\SaranController@destroy');

/* TESTIMONI */
Route::get('testimoni','Api\TestimoniController@index');
Route::get('testimoni/{id?}','Api\TestimoniController@show');
Route::post('testimoni/add','Api\TestimoniController@store');
Route::put('testimoni/update/{id?}','Api\TestimoniController@update');
Route::delete('testimoni/remove/{id?}','Api\TestimoniController@destroy');

/* BUKU */
Route::get('buku','Api\BukuController@index');
Route::get('buku/{id?}','Api\BukuController@show');
Route::post('buku/add','Api\BukuController@store');
Route::put('buku/update/{id?}','Api\BukuController@update');
Route::delete('buku/remove/{id?}','Api\BukuController@destroy');
