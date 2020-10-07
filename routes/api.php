<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Trabajador;
use App\Extraccion;
use App\Empaquetado;
use App\Caja;
use App\Devolucion;
use App\Medio;
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


Route::resource('trabajador', 'TrabajadorController'); 
Route::get('trabajador/{id}/extracciones', 'TrabajadorController@extracciones');
Route::resource('extraccion', 'ExtraccionController') ;
Route::resource('medio', 'MedioController') ;
Route::resource('caja', 'CajaController') ;
Route::resource('empaquetado', 'EmpaquetadoController') ;
Route::resource('devolucion', 'DevolucionController') ;


