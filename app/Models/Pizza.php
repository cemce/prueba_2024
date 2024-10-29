<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pizza extends Model
{
    protected $table = 'pizzas';
    protected $fillable = ['nombre', 'precio'];

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'pizza_ingrediente', 'pizza_id', 'ingrediente_id');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2) . '€';
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['precio'] = str_replace('€', '', $value);
    }

    public function getPriceTotalAttribute()
    {
        $totalPrice = $this->ingredientes->sum('precio');
        return number_format($totalPrice * 1.5, 2) . '€';
    }

    public function calculateTotalPrice()
    {
        $ingredientsPrice = $this->ingredientes->sum('precio');
        $totalPrice = $ingredientsPrice * 1.5;
        $this->update(['precio' => $totalPrice]);
    }
}

