<?php

use App\Http\Controllers\EgresoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ItemController;
use App\Models\Ingreso;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [ItemController::class, 'index']);

Route::prefix('item')->group(function () {

    Route::post('/store', [ItemController::class, 'store']);

    Route::get('/entradas', function () {
        return view('tables.entradas');
    });
});

Route::prefix('stock')->group(function () {

    Route::get('/salidas', [EgresoController::class, 'index']);
    Route::post('/store', [IngresoController::class, 'store']);
    Route::get('/entradas', [IngresoController::class, 'index']);
    Route::post('/delete', [EgresoController::class, 'store']);
});



Route::get('/item', function () {
    return view('welcome');
});
