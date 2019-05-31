<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Canvas\Tag;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Tag::class, function (Faker $faker) {
    // each tag has $num_words words separated by spaces
    $num_words = 3;
    //$name = $faker->sentence;
    $name = implode(" ", $faker->words($num_words));
    return [
        //'id' => str_random(36),
        'id' => Str::uuid(),
        'name' => $name,
        'slug' => str_slug($name, '-'),
        'created_at' => now(),
        'updated_at' => now(),
        'deleted_at' => NULL,
    ];
});
