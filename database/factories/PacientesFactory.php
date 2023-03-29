<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->word,
            'nome_mae' => $this->faker->unique()->word,
            'nome_pai' => $this->faker->unique()->word,
            'data_nascimento' => $this->faker->unique()->date(),
            'cpf' => $this->faker->randomNumber(5, true) . $this->faker->randomNumber(4, true),
            'cns' => $this->faker->randomNumber(7, true) . $this->faker->randomNumber(8, true),
        ];
    }
}
