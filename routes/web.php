<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\ClienteFinalController;
use App\Http\Controllers\BodegaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*proveedor*/
// web.php
Route::resource('proveedores', ProveedorController::class);
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{proveedor}', [ProveedorController::class, 'show'])->name('proveedores.show');
Route::get('/proveedores/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

// Rutas para listar, crear, mostrar, editar y eliminar productos
Route::resource('productos', ProductoController::class);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{product_id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{product_id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{product_id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{product_id}', [ProductoController::class, 'destroy'])->name('productos.destroy');


// Rutas para Distribuidores
Route::get('/distribuidores', [DistribuidorController::class, 'index'])->name('distribuidores.index');
Route::get('/distribuidores/create', [DistribuidorController::class, 'create'])->name('distribuidores.create');
Route::post('/distribuidores', [DistribuidorController::class, 'store'])->name('distribuidores.store');
Route::get('/distribuidores/{distribuidor}', [DistribuidorController::class, 'show'])->name('distribuidores.show');
Route::get('/distribuidores/{distribuidor}/edit', [DistribuidorController::class, 'edit'])->name('distribuidores.edit');
Route::put('/distribuidores/{distribuidor}', [DistribuidorController::class, 'update'])->name('distribuidores.update');
Route::delete('/distribuidores/{distribuidor}', [DistribuidorController::class, 'destroy'])->name('distribuidores.destroy');



// Rutas para ClienteFinal
Route::get('/clientesfinales', [ClienteFinalController::class, 'index'])->name('clientesfinales.index');
Route::get('/clientesfinales/create', [ClienteFinalController::class, 'create'])->name('clientesfinales.create');
Route::post('/clientesfinales', [ClienteFinalController::class, 'store'])->name('clientesfinales.store');
Route::get('/clientesfinales/{clientefinal}/edit', [ClienteFinalController::class, 'edit'])->name('clientesfinales.edit');
Route::put('/clientesfinales/{clientefinal}', [ClienteFinalController::class, 'update'])->name('clientesfinales.update');
Route::delete('/clientesfinales/{clientefinal}', [ClienteFinalController::class, 'destroy'])->name('clientesfinales.destroy');
Route::get('/clientesfinales/{clientefinal}', [ClienteFinalController::class, 'show'])->name('clientesfinales.show');


// Rutas para Bodegas
Route::get('/bodegas', [BodegaController::class, 'index'])->name('bodegas.index');
Route::get('/bodegas/create', [BodegaController::class, 'create'])->name('bodegas.create');
Route::post('/bodegas', [BodegaController::class, 'store'])->name('bodegas.store');
Route::get('/bodegas/{bodega}', [BodegaController::class, 'show'])->name('bodegas.show');
Route::get('/bodegas/{bodega}/edit', [BodegaController::class, 'edit'])->name('bodegas.edit');
Route::put('/bodegas/{bodega}', [BodegaController::class, 'update'])->name('bodegas.update');
Route::delete('/bodegas/{bodega}', [BodegaController::class, 'destroy'])->name('bodegas.destroy');