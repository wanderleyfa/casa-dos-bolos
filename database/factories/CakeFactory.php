<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Bolo de Milho', 'Bolo de Cenoura', 'Bolo de Chocolate', 'Bolo de Fubá', 'Bolo de Banana']),
            'weight' => $this->faker->randomElement([1, 2, 3, 4, 0]) * 1000,
            'value' => $this->faker->randomElement([1, 2, 3, 4, 0]),
            'inventory' => $this->faker->randomElement([1, 2, 3, 4, 0]),
        ];
    }
}
