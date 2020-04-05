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

        // for($i = 0; $i < 500; $i++) {
        // DB::table('movements')->insert([
        //     'user_id' => rand(1,50),
        //     'title' => $faker->name,
        //     'location' => $faker->state,
        //     'start_date' =>$faker->dateTimeBetween('-3 days', '+1 week'),
        //     'end_date' => now(),
        //     'verifier' => 'Boss',
        // ]);
        // }

        // factory(App\Minute::class, 50)->create()->each(function ($minutes) {
        //     // Seed the relation with one address
        //     $verifies = factory(App\Verify::class)->make();
        //     $minutes->verify()->save($verifies);

        // });

        factory(App\Product::class, 500)->create();
    }
}
