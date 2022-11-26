<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

/**ruta de producto */
Route::get('/', [ProductosController::class,"index"])->name('producto.invenario');
Route::post('/crear', [ProductosController::class,"store"])->name('producto.crear');
Route::get('/obtener', [ProductosController::class,"get"])->name('producto.lista');
Route::get('/actualizar/{id}', [ProductosController::class,"edit"])->name('producto.actualizar');
Route::put('/update/{id}', [ProductosController::class,"update"])->name('producto.update');
Route::delete('/eliminar/{id}', [ProductosController::class,"destroy"])->name('producto.eliminar');

/**ruta de ventas */
Route::get('/ventas/obtener', [VentasController::class,"get"])->name('ventas.lista');
Route::post('/ventas/crear', [VentasController::class,"store"])->name('ventas.crear');
Route::get('/ventas/confirmas/{id?}/{cantidad?}', [VentasController::class,"index"])->name('ventas.index');

/*ajax */
Route::get('/maximos/{tipo}', [ProductosController::class,"query"])->name('producto.query');