<?php

namespace Database\Seeders;

use App\Models\Games;
use App\Models\Countries;
use Illuminate\Database\Seeder;
use Database\Seeders\GamesSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\CountriesSeeder;
use Database\Seeders\UserPredictionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        CountriesSeeder::class,
        GamesSeeder::class,
        UserPredictionsSeeder::class,
        UsersSeeder::class,
      ]);

    }
}
