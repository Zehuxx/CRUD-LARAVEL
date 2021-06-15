<?php

namespace Database\Seeders;

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
        $this->call(CountriesTableSeeder::class);
        $this->call(EstatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);
    }
}
