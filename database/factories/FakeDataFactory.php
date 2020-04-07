<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Announcement;
use Faker\Generator as Faker;
use App\Minute;
use App\Movement;
use App\Verify;
use App\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'jawatan' => $faker->jobTitle,
        'notelefon' => $faker->phoneNumber,
    ];
});

$factory->define(Minute::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 20),
        'name' => $faker->name,
        'anjuran' => $faker->city,
        'tarikh' => $faker->dateTimeBetween('-5 days', '+2 week'),
        'tempat' => $faker->state,
        'pegawai' => 'Boss',
    ];
});

$factory->define(Verify::class, function (Faker $faker) {
    return [
        'arahan' => $faker->text,
        'pengesah' => 'Boss',
    ];
});

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text,
        'datetime' => $faker->dateTimeBetween('-3 days', '+1 week'),
    ];
});

$factory->define(Movement::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 50),
        'title' => $faker->name,
        'location' => $faker->state,
        'start_date' => $faker->dateTimeBetween('-3 days', '+1 week'),
        'end_date' => now(),
        'verifier' => $faker->name,
    ];
});
