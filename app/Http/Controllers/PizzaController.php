<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Requests\PizzaStore;
use App\Requests\PizzaUpdate;

class PizzaController extends Controller
{
    public function index() {
        return view('pizzas.index');
    }

    public function create() {
        return view('pizzas.create');
    }

    public function store(PizzaStore $request, Pizza $pizza) {

        $pizza = Pizza::create($request->validated());
        return redirect()->route('pizza.index');
    }

    public function show(Pizza $pizza) {
        return view('pizzas.show', compact('pizza'));
    }

    public function edit(Pizza $pizza) {
        return view('pizzas.edit', compact('pizza'));
    }

    public function update(PizzaUpdate $request, Pizza $pizza) {
        $pizza->update($request->validated());
        return redirect()->route('pizza.index');
    }
}
