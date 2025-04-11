<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for your Livewire component classes.
    | This value should match the namespace set in your composer.json file.
    |
    */

    'class_namespace' => 'App\\Http\\Livewire',  // o 'App\\Livewire' según la opción que elijas

    /*
    |--------------------------------------------------------------------------
    | View Path
    |--------------------------------------------------------------------------
    |
    | This value sets the root path for your Livewire component views. This
    | value should match the path set in your composer.json file.
    |
    */

    'view_path' => resource_path('views/livewire'),

    /*
    |--------------------------------------------------------------------------
    | Asset URL
    |--------------------------------------------------------------------------
    |
    | This value sets the root URL for your Livewire assets. This value should
    | match the URL set in your composer.json file.
    |
    */

    'asset_url' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware Group
    |--------------------------------------------------------------------------
    |
    | This value sets the middleware group for your Livewire routes. This value
    | should match the middleware group set in your routes/web.php file.
    |
    */

    'middleware_group' => 'web',

];
