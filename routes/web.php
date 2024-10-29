<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::get('/', function () {
    return view('dashboard');
});


Route::prefix('pizza')->group(function () {
    Route::get('/' , [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/create' , [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/' , [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/{pizza}' , [PizzaController::class, 'show'])->name('pizza.show');
});

Route::prefix('ingredientes')->group(function () {
    Route::get('/' , [IngredienteController::class, 'index'])->name('ingrediente.index');
    Route::get('/create' , [IngredienteController::class, 'create'])->name('ingrediente.create');
    Route::post('/' , [IngredienteController::class, 'store'])->name('ingrediente.store');
    Route::get('/{ingrediente}' , [IngredienteController::class, 'show'])->name('ingrediente.show');
});
