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

Route::get('santri','SantriController@index');
Route::get('santri/{id?}','SantriController@show');
Route::post('santri/add','SantriController@store');
Route::put('santri/update/{id?}','SantriController@update');
Route::delete('santri/remove/{id?}','SantriController@destroy');

Route::get('pengajar','PengajarController@index');
Route::get('pengajar/{id?}','PengajarController@show');
Route::post('pengajar/add','PengajarController@store');
Route::put('pengajar/update/{id?}','PengajarController@update');
Route::delete('pengajar/remove/{id?}','PengajarController@destroy');

Route::get('peserta','PesertaController@index');
Route::get('peserta/{id?}','PesertaController@show');
Route::post('peserta/add','PesertaController@store');
Route::put('peserta/update/{id?}','PesertaController@update');
Route::delete('peserta/remove/{id?}','PesertaController@destroy');

Route::get('semester','SemesterController@index');
Route::get('semester/{id?}','SemesterController@show');
Route::post('semester/add','SemesterController@store');
Route::put('semester/update/{id?}','SemesterController@update');
Route::delete('semester/remove/{id?}','SemesterController@destroy');

Route::get('level','LevelController@index');
Route::get('level/{id?}','LevelController@show');
Route::post('level/add','LevelController@store');
Route::put('level/update/{id?}','LevelController@update');
Route::delete('level/remove/{id?}','LevelController@destroy');

Route::get('kelas','KelasController@index');
Route::get('kelas/{id?}','KelasController@show');
Route::post('kelas/add','KelasController@store');
Route::put('kelas/update/{id?}','KelasController@update');
Route::delete('kelas/remove/{id?}','KelasController@destroy');

Route::get('infaq','InfaqController@index');
Route::get('infaq/{id?}','InfaqController@show');
Route::post('infaq/add','InfaqController@store');
Route::put('infaq/update/{id?}','InfaqController@update');
Route::delete('infaq/remove/{id?}','InfaqController@destroy');
