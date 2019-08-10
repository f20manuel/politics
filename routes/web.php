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

Route::get('/dashboard/personas', 'PersonaController@index')->name('personas');

Route::post('/search/personas', 'PersonaController@search')->name('searchPersonas');

Route::get('/exportar-personas', 'PersonaController@ExportarExcel')->name('expersonas');

Route::post('/importar-personas', 'PersonaController@ImportarExcel')->name('inpersonas');

Route::post('/guardar-personas', 'PersonaController@Guardar')->name('guardarPersonas');

Route::post('/editar-estado', 'PersonaController@updateEstado')->name('updatePersona');

Route::post('/editar-persona', 'PersonaController@update')->name('updatePersona2');

Route::get('/persona/{persona}/edit', 'PersonaController@edit')->name('editarPersona');

Route::post('/eliminarPersona', 'PersonaController@eliminar')->name('eliminarPersona');

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

