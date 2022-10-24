<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => 'Client name',
            'lastname' => $this->faker->firstName(),
            'age' => 18,
            'city' => 'Client city',
            'goal' => 'Client goal',
            'medical_history' => 'url'
        ];
    }
}
