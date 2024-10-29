<?php

require __DIR__.'/auth.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredienteController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth']);

Route::prefix('pizza')->middleware(['auth'])->group(function () {
    Route::get('/', [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/create', [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/', [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/{pizza}', [PizzaController::class, 'show'])->name('pizza.show');
});

Route::prefix('ingredientes')->middleware(['auth'])->group(function () {
    Route::get('/', [IngredienteController::class, 'index'])->name('ingrediente.index');
    Route::get('/create', [IngredienteController::class, 'create'])->name('ingrediente.create');
    Route::post('/', [IngredienteController::class, 'store'])->name('ingrediente.store');
    Route::get('/{ingrediente}', [IngredienteController::class, 'show'])->name('ingrediente.show');
});


