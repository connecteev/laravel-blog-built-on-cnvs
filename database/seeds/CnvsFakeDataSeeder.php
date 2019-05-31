<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Canvas\Post;
use Canvas\Tag;
use Canvas\Topic;

// Call using command: php artisan db:seed --class=CnvsFakeDataSeeder
class CnvsFakeDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users')->truncate();
      DB::table('canvas_posts_tags')->truncate();
      DB::table('canvas_posts_topics')->truncate();
      DB::table('canvas_posts')->truncate();
      DB::table('canvas_tags')->truncate();
      DB::table('canvas_topics')->truncate();
      DB::table('canvas_views')->truncate();
      DB::table('password_resets')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      User::create([
        'name' => 'Admin Account',
        'email' =>'admin@gmail.com',
        'password' => bcrypt('admin1234'),
        'remember_token' => str_random(10),
        'email_verified_at' => '2019-05-30 18:15:41',
      ]);

      $faker = \Faker\Factory::create();

      // use Faker to create random users
      //factory(App\User::class, 10)->create();

      // use Faker to create random tags
      factory(Canvas\Tag::class, 10)->create();

      // use Faker to create random topics
      factory(Canvas\Topic::class, 5)->create();

      // use Faker to create random posts
      factory(Canvas\Post::class, 300)->create();

      // Get all the tags attaching up to $max_tags random tags to each post
      $max_tags = 2;
      $tags = Canvas\Tag::all();

      // Get all the topics
      $topics = Canvas\Topic::all();

      // Populate the canvas_posts_tags and canvas_posts_topics pivot tables
      Canvas\Post::all()->each(function ($post) use ($tags, $topics, $max_tags) { 
          $post->tags()->attach(
              $tags->random(rand(1, $max_tags))->pluck('id')->toArray()
          );
          $post->topic()->attach(
              $topics->random(1)->pluck('id')->toArray()
          );
      });

    }
}
