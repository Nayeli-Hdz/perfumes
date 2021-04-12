<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;

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
Route::get('Principal', function () {
    return view('Principal');
});

//--------------USUARIOS
Route::get('Usuarios', [UsuariosController::class, 'Usuarios'])->name ('Usuarios');

Route::post('Mensaje', [UsuariosController::class, 'Mensaje'])->name ('Mensaje');

Route::post('guardarusuario', [UsuariosController::class, 'guardarusuario'])->name ('guardarusuario');

Route::get('reporteusuarios', [UsuariosController::class, 'reporteusuarios'])->name ('reporteusuarios');
