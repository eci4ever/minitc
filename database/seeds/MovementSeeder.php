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

        for($i = 0; $i < 500; $i++) {
        DB::table('movements')->insert([
            'user_id' => rand(1,50),
            'title' => $faker->name,
            'location' => $faker->state,
            'start_date' =>$faker->dateTimeBetween('-3 days', '+1 week'),
            'end_date' => now(),
            'verifier' => 'Boss',
        ]);
        }
    }
}
