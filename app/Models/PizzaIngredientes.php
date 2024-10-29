<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaIngredientes extends Model
{
    protected $table = 'pizza_ingrediente';
    protected $fillable = ['pizza_id', 'ingrediente_id'];

    public function pizza()
    {
        return $this->belongsTo(Pizzas::class, 'pizza_id');
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingredientes::class, 'ingrediente_id');
    }

}
