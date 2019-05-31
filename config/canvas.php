<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Canvas Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Canvas will be accessible from. You are free
    | to change this path to anything you like. Note that updating the URI
    | will affect the internal API paths that are not exposed to users.
    |
    */

    'path' => env('CANVAS_PATH_NAME', 'canvas'),

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be attached to every route in Canvas, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with the list.
    |
    */

    'middleware' => [
        'web',
        'auth',
    ],

    /*
    |--------------------------------------------------------------------------
    | Uploads Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Canvas will use to put file uploads, you can
    | use any of the disks defined in your config/filesystems.php file.
    | You may also configure the path files should be stored at.
    |
    */

    'storage_disk' => env('CANVAS_STORAGE_DISK', 'local'),

    'storage_path' => env('CANVAS_STORAGE_PATH', 'public/canvas'),

    /*
    |--------------------------------------------------------------------------
    | Unsplash Integration
    |--------------------------------------------------------------------------
    |
    | Visit https://unsplash.com/oauth/applications to create a new unsplash
    | app. Use the Access Key to integrate with the Unsplash API
    |
    */

    'unsplash' => [
        'access_key' => env('CANVAS_UNSPLASH_ACCESS_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Weekly Digest
    |--------------------------------------------------------------------------
    |
    | This option enables Canvas to send notifications via e-mail. A weekly
    | summary digest will be delivered via the default mail driver. This
    | will provide helpful insights into your content and its impact.
    |
    */

    'mail' => [
        'enabled' => env('CANVAS_MAIL_ENABLED', false),
    ],

];
