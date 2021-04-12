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

//este recibe un parametro que es la id del empleado que se va a desactivar
Route::get('desactivausuario/{id_usuario}',[UsuariosController::class, 'desactivausuario'])->name('desactivausuario');

//Este recibe un parametro que es la id del empleado para que se active el empleado
Route::get('activarusuario/{id_usuario}',[UsuariosController::class, 'activarusuario'])->name('activarusuario');

//Este recibe un parametro que es la id del empleado para que se borre el empleado
Route::get('borrausuario/{id_usuario}',[UsuariosController::class, 'borrausuario'])->name('borrausuario');

//Este recibe un parametro que es la id del empleado para que se pueda modificar el empleado
Route::get('modificausuario/{id_usuario}',[UsuariosController::class, 'modificausuario'])->name('modificausuario');

Route::post('guardacambios', [UsuariosController::class, 'guardacambios'])->name ('guardacambios');
