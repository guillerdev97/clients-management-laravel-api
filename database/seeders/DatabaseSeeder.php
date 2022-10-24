<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // users
        User::factory(2)->create();

        // clients
        Client::factory(10)->create();
    }
}
