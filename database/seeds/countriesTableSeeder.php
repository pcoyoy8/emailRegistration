<?php

use Illuminate\Database\Seeder;
use App\country;

class countriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            country::create([
                'name' => $faker->country,
            ]);
        }
    }
}
