<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\PaqueteriaController;
use App\Http\Controllers\UsuariosController;

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

//-------Productos
Route::get('Productos',[ProductosController::class,'Productos']);
Route::POST('GuardarProductos',[ProductosController::class,'GuardarProductos'])->name('GuardarProductos');
Route::get('ReporteProductos',[ProductosController::class,'ReporteProductos'])->name('ReporteProductos');
Route::get('DesactivarProductos/{id}',[ProductosController::class,'DesactivarProductos'])->name('DesactivarProductos');
Route::get('EliminarProductos/{id}',[ProductosController::class,'EliminarProductos'])->name('EliminarProductos');
Route::get('RestaurarProductos/{id}',[ProductosController::class,'RestaurarProductos'])->name('RestaurarProductos');
Route::POST('EditarProductos/{id}',[ProductosController::class,'EditarProductos'])->name('EditarProductos');
Route::get('ModificarProductos/{id}/edit',[ProductosController::class,'ModificarProductos'])->name('ModificarProductos');


//--------MARCAS
Route::get('Marcas',[MarcasController::class,'Marcas']);
Route::POST('GuardarMarcas',[MarcasController::class,'GuardarMarcas'])->name('GuardarMarcas');
Route::get('ReporteMarcas',[MarcasController::class,'ReporteMarcas'])->name('ReporteMarcas');
Route::get('DesactivarMarca/{id}',[MarcasController::class,'DesactivarMarca'])->name('DesactivarMarca');
Route::get('EliminarMarca/{id}',[MarcasController::class,'EliminarMarca'])->name('EliminarMarca');
Route::get('RestaurarMarca/{id}',[MarcasController::class,'RestaurarMarca'])->name('RestaurarMarca');
Route::POST('EditarMarca/{id}',[MarcasController::class,'EditarMarca'])->name('EditarMarca');
Route::get('ModificarMarca/{id}/edit',[MarcasController::class,'ModificarMarca'])->name('ModificarMarca');


//--------PROVEEDORES

Route::get('ReporteProveedores',[ProveedoresController::class,'ReporteProveedores'])->name('ReporteProveedores');
Route::get('Proveedores',[ProveedoresController::class,'Proveedores']);
Route::POST('GuardarProveedores',[ProveedoresController::class,'GuardarProveedores'])->name('GuardarProveedores');
Route::POST('EditarProveedores/{id}',[ProveedoresController::class,'EditarProveedores'])->name('EditarProveedores');
Route::get('ModificarProveedores/{id}/edit',[ProveedoresController::class,'ModificarProveedores'])->name('ModificarProveedores');
Route::get('DesactivarProveedores/{id}',[ProveedoresController::class,'DesactivarProveedores'])->name('DesactivarProveedores');
Route::get('EliminarProveedores/{id}',[ProveedoresController::class,'EliminarProveedores'])->name('EliminarProveedores');
Route::get('RestaurarProveedores/{id}',[ProveedoresController::class,'RestaurarProveedores'])->name('RestaurarProveedores');