<?php

namespace Database\Seeders;

use App\Models\Advertising;
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
        Advertising::factory(10)->create();
    }
}
