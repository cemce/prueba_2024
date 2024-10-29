<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Http\Requests\IngredienteStore;
use App\Http\Requests\IngredienteUpdate;

class IngredientsController extends Controller
{
    public function index() {
        $ingredientes = Ingrediente::all();
        return view('ingrediente.index', compact('ingredientes'));
    }

    public function create() {
        return view('ingrediente.create');
    }

    public function store(IngredienteStore $request) {
        Ingrediente::create($request->validated());
        return redirect()->route('ingrediente.index');
    }

    public function show(Ingrediente $ingrediente) {
        return view('ingrediente.show', compact('ingrediente'));
    }

    public function edit(Ingrediente $ingrediente) {
        return view('ingrediente.edit', compact('ingrediente'));
    }

    public function update(IngredienteUpdate $request, Ingrediente $ingrediente) {
        $ingrediente->update($request->validated());
        return redirect()->route('ingrediente.index');
    }

    public function delete(Ingrediente $ingrediente) {
        $ingrediente->delete();
        return redirect()->route('ingrediente.index');
    }
}
