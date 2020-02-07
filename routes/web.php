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
Route::view('/','login');
Route::post('entrar','AccesoController@validar');
Route::get('logout','AccesoController@salir');

Route::get('solicitudes', function () {
    return view('administrador.solicitudes');
});

Route::get('usuarios', function () {
    return view('administrador.solicitantes');
});

Route::get('ambulancias', function () {
    return view('administrador.ambulancias');
});

Route::get('choferes', function () {
    return view('administrador.choferes');
});

Route::get('destinos', function () {
    return view('administrador.destinos');
});

Route::get('viajes', function () {
    return view('administrador.viajes');
});

Route::get('admin', function () {
    return view('administrador.administrador');
});

Route::apiResource('apiUsuario','ApiUsuarioController');
Route::apiResource('apiSolicitud','ApiSolicitudController');
Route::apiResource('apiChofer','ApiChoferController');
Route::apiResource('apiAmbulancia','ApiAmbulanciaController');
Route::apiResource('apiViaje','ApiViajeController');
Route::apiResource('apiDestino','ApiDestinoController');
Route::apiResource('apiArchivos','ApiArchivosController');
Route::apiResource('apiCuenta','ApiCuentaController');