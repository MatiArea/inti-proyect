<?php

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


Route::get('/', function () {
    return view('items.index');
});

Route::prefix('stock')->group(function () {

    Route::get('/salidas', function () {
        return view('tables.salidas');
    });

    Route::get('/entradas', function () {
        return view('tables.entradas');
    });
});



Route::get('/item', function () {
    return view('welcome');
});
