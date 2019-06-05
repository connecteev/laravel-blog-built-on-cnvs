<p align="center">
    <br>
    <img src="https://raw.githubusercontent.com/cnvs/art/master/github-header.png" width="400">
</p>

## Introduction

A [Laravel](https://laravel.com) publishing platform but on [Canvas](https://github.com/cnvs/canvas), a fully open source package to extend your application and get you up-and-running with a blog in just a few minutes. In addition to a distraction-free 
writing experience, you can view monthly trends on your content, get insights into reader traffic and more!


## Quick and easy Installation

1. Run
```bash
git clone https://github.com/connecteev/laravel-blog-built-on-cnvs.git
```

2. Modify .env with your DB settings:
```bash
DB_DATABASE=laravel-blog-built-on-cnvs
DB_USERNAME=root
DB_PASSWORD=root
```

3. Run:
```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```
> **NOTE:**
You do NOT need to run these steps (from the cnvs documentation: https://github.com/cnvs/canvas):
```bash
composer require cnvs/canvas
php artisan make:auth (this has been run and creates the admin user)
php artisan canvas:install (has been run)
php artisan canvas:setup
```

4. (Optional) To seed with Fake data (1 fake admin user, fake posts, tags, topics, etc.), run:
```bash
composer dump-autoload
php artisan db:seed --class=CnvsFakeDataSeeder
```
Note that this is NOT run by default when you run `php artisan db:seed`

5. Run `php artisan serve`

6. (Optional) If you haven't used the seeder (see above) to create an admin user yet, you should do that now. Navigate your browser to /register to create an admin user.
Then go to /login and log in to the CMS / Admin dashboard using your admin username and password (or username and password: `admin@gmail.com / admin1234` if you used the seeder)

7. Navigate your browser to /blog to see the Blog's front-end.




## Optional Configuration

> **Note:** The following steps are optional configurations, you are not required to complete them.

**Want to get started fast?** Just run `php artisan canvas:setup` after installing Canvas. Then, navigate your browser to `http://your-app.test/blog` or any other URL that is assigned to your application. This command scaffolds a default frontend for your entire blog!


If you want to include [Unsplash](https://unsplash.com) images in your post content, set up a new application at [https://unsplash.com/oauth/applications](https://unsplash.com/oauth/applications). Grab your access key and update `config/canvas.php`:

```php
'unsplash' => [
    'access_key' => env('CANVAS_UNSPLASH_ACCESS_KEY'),
],
```

**Want a weekly summary?** Canvas provides support for a weekly e-mail that gives you quick stats of the content you've authored, delivered straight to your inbox. Once your application is [configured for sending mail](https://laravel.com/docs/5.8/mail), update `config/canvas.php`:

```php
'mail' => [
    'enabled' => env('CANVAS_MAIL_ENABLED', false),
],
```

Since the weekly digest runs on [Laravel's Scheduler](https://laravel.com/docs/5.8/scheduling#introduction), you'll need to add the following cron entry to your server:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Updates

You may update your Canvas installation using composer:

```bash
composer update
```

Run any new migrations using the `migrate` Artisan command:

```bash
php artisan migrate
```

Re-publish the assets using the `canvas:publish` Artisan command:

```bash
php artisan canvas:publish
```

## Testing

Run the tests with:

```bash
composer test
```
