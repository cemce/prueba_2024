<?php

require __DIR__.'/auth.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientsController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('pizza')->middleware(['auth'])->group(function () {
    Route::get('/', [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/create', [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/', [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/{pizza}/update', [PizzaController::class, 'update'])->name('pizza.update');
    Route::post('/{pizza}/delete', [PizzaController::class, 'delete'])->name('pizza.delete');
});

Route::prefix('ingredientes')->middleware(['auth'])->group(function () {
    Route::get('/', [IngredientsController::class, 'index'])->name('ingrediente.index');
    Route::get('/create', [IngredientsController::class, 'create'])->name('ingrediente.create');
    Route::post('/', [IngredientsController::class, 'store'])->name('ingrediente.store');
    Route::post('/{ingrediente}/delete', [IngredientsController::class, 'delete'])->name('ingrediente.delete');
    Route::get('/{ingrediente}', [IngredientsController::class, 'show'])->name('ingrediente.show');
});


