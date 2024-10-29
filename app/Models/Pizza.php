<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = 'pizzas';
    protected $fillable = ['nombre', 'precio'];

    public function ingredientes()
    {
        return $this->belongsToMany(Ingredientes::class, 'pizza_ingrediente', 'pizza_id', 'ingrediente_id');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2) . '€';
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['precio'] = str_replace('€', '', $value);
    }

    public function getPrecioTotalAttribute()
    {
        $precioIngredientes = $this->ingredientes->sum('precio');
        return number_format($precioIngredientes * 1.5, 2) . '€';
    }
}
