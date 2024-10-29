<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredientes extends Model
{
    protected $table = 'ingredientes';
    protected $fillable = ['nombre', 'precio'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizzas::class, 'pizza_ingrediente', 'ingrediente_id', 'pizza_id');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2) . '€';
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['precio'] = str_replace('$', '', $value);
    }

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar) {
            return $query->where('nombre', 'LIKE', "%$buscar%");
        }
    }

    public function getAllIngredients()
    {
        return $this->all();
    }
}
