<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/clientes', ClientesController::class);
Route::resource('/vendas', VendasController::class);
