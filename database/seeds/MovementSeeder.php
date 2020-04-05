<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 26; $i++) {
        DB::table('movements')->insert([
            'user_id' => rand(1,3),
            'title' => $faker->name,
            'location' => $faker->city,
            'start_date' => now(),
            'end_date' => now(),
            'verifier' => $faker->name,
        ]);
        }
    }
}
