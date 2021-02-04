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

/* Route::get('/', function () {
  return view('welcome');
  }); */

Route::get('/', 'LogInController@index');
Route::post('verificar-login', 'LogInController@verificar');
Route::get('cerrar-sesion','LogInController@cerrarSesion');
Route::get('verificar-correo','LogInController@verificarCorreo');



Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios/editar/{id}', 'UsuarioController@editar');
Route::post('usuarios/actualizar', 'UsuarioController@actualizar');
Route::post('recuperar-password','UsuarioController@recuperarPassword');
Route::post('registrar-usuario','UsuarioController@ingresar');
