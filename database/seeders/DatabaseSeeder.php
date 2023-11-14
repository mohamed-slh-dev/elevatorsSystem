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
        $this->call(CountriesSeeder::class);
        $this->call(RegionsSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(NeighporsSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(UsersSeeder::class);


    }
}
