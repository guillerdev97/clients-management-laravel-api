<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => 'Client name',
            'age' => 'Client age',
            'city' => 'Client city',
            'goal' => 'Client goal',
            'medical history' => 'url'
        ];
    }
}
