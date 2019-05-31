<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Canvas\Post;
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

$factory->define(Post::class, function (Faker $faker) {
	//$title = $faker->sentence;
    // each post title has $min_words up to $max_words words separated by spaces
    $min_words = 5;
    $max_words = 10;
	$title = implode(" ", $faker->words(rand($min_words, $max_words)));
    return [
    	//'id' => str_random(36),
    	'id' => Str::uuid(),
        'title' => $title,
        'slug' => str_slug($title, '-'),
        'summary' => $faker->paragraph,
        'body' => $faker->paragraph(100),
        'published_at' => now(),
        'featured_image' => $faker->imageUrl($width = 640, $height = 480),
        'featured_image_caption' => $title,
        'user_id' => 1,
        //'meta' => $faker->sentence,
        'created_at' => now(),
        'updated_at' => now(),
        'deleted_at' => NULL,
    ];
});
