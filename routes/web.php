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





//Lideres
Route::get('/lideres', 'LiderController@index')->name('lideres.index');
Route::get('/lider/{lider}/edit', 'LiderController@edit')->name('lideres.edit'); // Vista para editar
Route::post('/importar-personas', 'PersonaController@ImportarExcel')->name('inpersonas');
Route::get('/exportar-lideres', 'LiderController@ExportarExcel')->name('exlideres');
Route::post('/search/lideres', 'LiderController@search')->name('searchLideres'); //Busqueda de Líderes
Route::post('/lideres/guardar', 'LiderController@create')->name('lideres.save')
                                                         ->middleware('permission:lideres.save'); // Guardar
Route::post('/editar-lider/{lider}', 'LiderController@update')->name('lideres.update')
                                                              ->middleware('permission:lideres.update'); // Editar
Route::post('/eliminarLider/{id}', 'LiderController@destroy')->name('lideres.delete')
                                                             ->middleware('permission:lideres.delete'); // Eliminar
Route::post('/editar-estado-lider/{lider}', 'LiderController@updateEstado')->name('lideres.edit.estado')
                                                                           ->middleware('permission:lideres.edit.estado'); // Editar estado Apoyo

//Personas
Route::get('/personas', 'PersonaController@index')->name('personas.index');
Route::get('/persona/{persona}/edit', 'PersonaController@edit')->name('personas.edit'); //Vista para editar
Route::get('/exportar-personas', 'PersonaController@ExportarExcel')->name('expersonas');
Route::post('/search/personas', 'PersonaController@search')->name('searchPersonas'); //Busqueda de Líderes
Route::post('/guardar-personas', 'PersonaController@Guardar')->name('personas.save')
                                                             ->middleware('permission:personas.save'); // Guardar
Route::post('/editar-persona/{persona}', 'PersonaController@update')->name('personas.update')
                                                                    ->middleware('permission:personas.update'); // Editar
Route::post('/eliminarPersona/{persona}', 'PersonaController@eliminar')->name('personas.delete')
                                                                       ->middleware('permission:personas.delete'); // Eliminar
Route::post('/editar-estado/{persona}', 'PersonaController@updateEstado')->name('personas.edit.estado')
                                                                         ->middleware('permission:personas.edit.estado'); //Editar Estado de Apoyo

//selects en Personas, lideres y testigos
Route::post('/enviarDepartamento', 'PersonaController@selectDepartamento')->name('enviarDepartamento');
Route::post('/enviarMunicipio', 'PersonaController@selectMunicipio')->name('enviarMunicipio');

//usuarios
Route::get('escritorio/usuarios', 'UserController@index')->name('users.index')
                                                         ->middleware('permission:users.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

