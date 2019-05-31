Quick and easy Installation:

1. Run
git clone https://github.com/connecteev/laravel-blog-built-on-cnvs.git

2. Modify .env with your DB settings:
DB_DATABASE=cnvs
DB_USERNAME=root
DB_PASSWORD=root

3. Run:
php artisan migrate
php artisan db:seed
php artisan storage:link 

NOTE: You do NOT need to run these steps (from the cnvs documentation: https://github.com/cnvs/canvas):
composer require cnvs/canvas
php artisan make:auth (this has been run and creates the admin user)
php artisan canvas:install (has been run)
php artisan canvas:setup

4. Run:
php artisan serve

5. Navigate your browser to /login and log in to the CMS / Admin dashboard using
username and password: admin@gmail.com / qwer1234

6. Navigate your browser to /blog to see the Blog's front-end.
