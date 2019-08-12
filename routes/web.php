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
    return view('auth.login');
});

Route::get('/personas', 'PersonaController@index')->name('personas');
Route::get('/lideres', 'LiderController@index')->name('lideres');

Route::post('/lideres/guardar', 'LiderController@create')->name('guardarLider');

Route::post('/search/personas', 'PersonaController@search')->name('searchPersonas');
Route::post('/search/lideres', 'LiderController@search')->name('searchLideres');

Route::get('/exportar-personas', 'PersonaController@ExportarExcel')->name('expersonas');
Route::get('/exportar-lideres', 'LiderController@ExportarExcel')->name('exlideres');

Route::post('/importar-personas', 'PersonaController@ImportarExcel')->name('inpersonas');

Route::post('/guardar-personas', 'PersonaController@Guardar')->name('guardarPersonas');

Route::post('/editar-estado/{persona}', 'PersonaController@updateEstado')->name('updatePersona');
Route::post('/editar-estado-lider/{lider}', 'LiderController@updateEstado')->name('updateEstadoLider');

Route::post('/editar-persona/{persona}', 'PersonaController@update')->name('updatePersona2');
Route::post('/editar-lider/{lider}', 'LiderController@update')->name('updateLider');

Route::get('/persona/{persona}/edit', 'PersonaController@edit')->name('editarPersona');
Route::get('/lider/{lider}/edit', 'LiderController@edit')->name('editarlider');

Route::post('/eliminarPersona/{persona}', 'PersonaController@eliminar')->name('eliminarPersona');
Route::post('/eliminarLider/{id}', 'LiderController@destroy')->name('eliminarLider');

//selects en Personas, lideres y testigos
Route::post('/enviarDepartamento', 'PersonaController@selectDepartamento')->name('enviarDepartamento');
Route::post('/enviarMunicipio', 'PersonaController@selectMunicipio')->name('enviarMunicipio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

