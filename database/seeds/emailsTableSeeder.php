<?php

use Illuminate\Database\Seeder;
use App\email;

class emailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            email::create([
                'email' => $faker->email,
                'country_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
