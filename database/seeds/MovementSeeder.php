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
        // factory(App\User::class, 100)->create();

        // factory(App\Announcement::class, 500)->create();

        factory(App\Movement::class, 500)->create();

        // factory(App\Minute::class, 50)->create()->each(function ($minutes) {
        //     // Seed the relation with one address
        //     $verifies = factory(App\Verify::class)->make();
        //     $minutes->verify()->save($verifies);
        // });
    }
}
