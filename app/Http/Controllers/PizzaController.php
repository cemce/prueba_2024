<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingrediente;
use App\Http\Requests\PizzaStore;
use App\Http\Requests\PizzaUpdate;

class PizzaController extends Controller
{
    public function index() {
        $pizzas = Pizza::all();
        $ingredientes = Ingrediente::all();
        return view('pizza.index', compact('pizzas', 'ingredientes'));
    }

    public function create() {
        return view('pizza.create');
    }

    public function store(PizzaStore $request) {
        $pizza = Pizza::create($request->validated());
        //Aunque el attach no siga del todo los principios del solid, en este caso me parece adecuado para no crear un método en el modelo, ya que es una app pequeña y no se va a reutilizar
        $pizza->ingredientes()->attach($request->ingredientes);
        $pizza->calculateTotalPrice();
        return redirect()->route('pizza.index');
    }

    public function show(Pizza $pizza) {
        return view('pizza.show', compact('pizza'));
    }

    public function edit(Pizza $pizza) {
        return view('pizza.edit', compact('pizza'));
    }

    public function update(PizzaUpdate $request, Pizza $pizza) {
        $pizza->update($request->validated());
        return redirect()->route('pizza.index');
    }

    public function destroy(Pizza $pizza) {
        $pizza->ingredientes()->detach();
        $pizza->delete();
        return redirect()->route('pizza.index')->with('success', 'Pizza eliminada correctamente');
    }
}
