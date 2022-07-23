<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\VentaController;
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
    return view('welcome');
});

Route::get('/prendas',[PrendaController::class,'index'])->name('prenda.index');
Route::get('/registrar-prenda',[PrendaController::class,'create'])->name('prenda.create');
Route::get('/store',[PrendaController::class,'store'])->name('prenda.store');

Route::get('/ventas',[VentaController::class,'index'])->name('venta.index');
Route::get('/registrar-venta',[VentaController::class,'create'])->name('venta.create');
Route::post('/store',[VentaController::class,'store'])->name('venta.store');
Route::post('/reporte',[VentaController::class,'store'])->name('venta.reporte');

Route::get('/clientes',[ClienteController::class,'index'])->name('cliente.index');
Route::get('/registrar-cliente',[ClienteController::class,'create'])->name('cliente.create');
Route::get('/store',[ClienteController::class,'store'])->name('cliente.store');

