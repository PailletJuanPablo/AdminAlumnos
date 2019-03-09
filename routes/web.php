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

Route::get('asistencia/{status}/{id}', 'AsistenciaController@index');
Route::get('/admin/gestion_asistencias', 'AsistenciaController@interactive');
Route::get('inicio', 'InicioController@index');
Route::post('update_asistencia', 'AsistenciaController@ajax')->name('update_asistencia');
Route::get('/admin/update_asistencia_admin/{id}', 'AsistenciaController@gestionAdmin')->name('update_asistencia_admin');
