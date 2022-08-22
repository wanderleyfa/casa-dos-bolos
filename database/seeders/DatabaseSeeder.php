<?php

namespace Database\Seeders;

use App\Models\Cake;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cake::factory(10)->create();
    }
}
