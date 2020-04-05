<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Minute;
use App\Verify;
use App\Product;

$factory->define(Minute::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,20),
        'name' => $faker->name,
        'anjuran' => $faker->city,
        'tarikh' => $faker->dateTimeBetween('-3 days', '+1 week'),
        'tempat' => $faker->state,
        'pegawai' => 'Boss',
    ];
});

$factory->define(Verify::class, function (Faker $faker) {
    return [
        'arahan' => $faker->name,
        'pengesah' => 'Boss',
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->dateTimeBetween('-3 days', '+1 week'),
    ];
});
