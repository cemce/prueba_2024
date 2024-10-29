<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaControllerApi extends Controller
{
    public function index() {
        $pizzas = Pizza::all()->with('ingredientes')->get();
        return response()->json($pizzas);
    }
}
