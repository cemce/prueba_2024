<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredients;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IngredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create('es_ES');
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomFloat(2, 5, 20),
        ];
    }
}
