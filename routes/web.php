<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\TipoProductoController;

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
    return view('login');
});
Route::post('/login', [LoginController::class, 'check']);

Route::get('/inicio', [ItemController::class, 'index']);

Route::prefix('item')->group(function () {
    Route::post('/store', [ItemController::class, 'store']);
    Route::delete('/delete/{id}', [ItemController::class, 'destroy']);

    Route::get('/entradas', function () {
        return view('tables.entradas');
    });

    Route::get('/export', [ItemController::class, 'export']);
});

Route::prefix('stock')->group(function () {
    Route::get('/salidas', [EgresoController::class, 'index']);
    Route::get('/salidas/{id}', [EgresoController::class, 'show']);
    Route::post('/salidas/descarga', [EgresoController::class, 'download']);
    Route::post('/delete', [EgresoController::class, 'store']);

    Route::post('/store', [IngresoController::class, 'store']);
    Route::get('/entradas', [IngresoController::class, 'index']);
    Route::get('/entradas/{id}', [IngresoController::class, 'show']);
    Route::post('/entradas/descarga', [IngresoController::class, 'download']);
});

Route::prefix('ubicacion')->group(function () {
    Route::get('/', [UbicacionController::class, 'index']);
    Route::post('/store', [UbicacionController::class, 'store']);
});

Route::prefix('responsable')->group(function () {
    Route::get('/', [ResponsableController::class, 'index']);
    Route::post('/store', [ResponsableController::class, 'store']);
});

Route::prefix('tipos_productos')->group(function () {
    Route::get('/', [TipoProductoController::class, 'index']);
    Route::post('/store', [TipoProductoController::class, 'store']);
});

Route::get('/item', function () {
    return view('welcome');
});

Route::prefix('icono')->group(function () {
    Route::get('/', function () {
        return view('logo.index');
    });
    Route::post('/store', [LogoController::class, 'store']);
});
