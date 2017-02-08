<?php

return [

    /*
    |--------------------------------------------------------------------------
    | App name
    |--------------------------------------------------------------------------
    |
    | App name will be used in Email template and Statestics screen
    |--------------------------------------------------------------------------
    */
    'app_name' => env('APP_NAME', ''),

    /*
    |--------------------------------------------------------------------------
    | Database Configurations
    |--------------------------------------------------------------------------
    |
    | Mysql is only currently supported
    |--------------------------------------------------------------------------
    */
    'database' => [
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', 'root'),
        'host'     => env('DB_HOST', 'localhost'),
        'name'     => env('DB_DATABASE', 'db_name'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Configurations
    |--------------------------------------------------------------------------
    |
    | Basic email configuration here and rest will taken care from your .env
    | file i.e. mail_driver, mail_host etc.
    |--------------------------------------------------------------------------
    */
    'mail' => [
        'from'     => env('MAIL_ADDRESS', ''),
        'to'       => env('MAIL_TO', ''),
        'alias'    => env('MAIL_NAME', ''),
        'template' => 'emails.db_backup_email',
    ],

    /*
    |--------------------------------------------------------------------------
    | Backup Storage Configurations
    |--------------------------------------------------------------------------
    |
    | Currently supported : filesystem
    |--------------------------------------------------------------------------
    */
    'storage' => [
        // Use filesystem
        // filesystem configurations will be copied from laravel filesystem configuration
        'default' => 'filesystem',

        'disk' => [],
    ],
];
