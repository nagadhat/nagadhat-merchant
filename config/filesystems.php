<?php
$base_url = 'I:\nagadhat-laravel';

if (config('app.env') == 'staging') {
    $base_url = '/home/zxqnwvdhtb/public_html';
} elseif (config('app.env') == 'production') {
    $base_url = '/home/dwmbnght/public_html';
} else {
    // shahib
    // $base_url = 'D:\shihab\nagadhat-customer';
    // akash
    $base_url = "C:/xampp/htdocs/nagadhat-customer";
}

return [
    /*products_categorie
      |--------------------------------------------------------------------------
      | Default Filesystem Disk
      |--------------------------------------------------------------------------
      |
      | Here you may specify the default filesystem disk that should be used
      | by the framework. The "local" disk, as well as a variety of cloud
      | based disks are available to your application. Just store away!
      |
     */

    'default' => env('FILESYSTEM_DRIVER', 'local'),
    /*
      |--------------------------------------------------------------------------
      | Filesystem Disks
      |--------------------------------------------------------------------------
      |
      | Here you may configure as many filesystem "disks" as you wish, and you
      | may even configure multiple disks of the same driver. Defaults have
      | been setup for each driver as an example of the required options.
      |
      | Supported Drivers: "local", "ftp", "sftp", "s3"
      |
     */
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        /* Override Root url of the website */
        'public_web_url' => [
            'driver' => 'local',
            'root' => $base_url,
            'visibility' => 'public',
        ],
        /* .Override Root url of the website end */
        'sftp' => [
            'driver' => 'sftp',
            'host' => env('SFTP_HOST'),

            // Settings for basic authentication...
            'username' => env('SFTP_USERNAME'),
            'password' => env('SFTP_PASSWORD'),

            // Settings for SSH key based authentication with encryption password...
            // 'privateKey' => env('SFTP_PRIVATE_KEY'),
            // 'password' => env('SFTP_PASSWORD'),

            // Optional SFTP Settings...
            // 'port' => env('SFTP_PORT', 22),
            'root' => env('SFTP_ROOT'),
            // 'timeout' => 30,
            // 'cache' => [
            //     'store' => 'memcached',
            //     'expire' => 600,
            //     'prefix' => 'cache-prefix',
            // ],
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],
    ],
    /*
      |--------------------------------------------------------------------------
      | Symbolic Links
      |--------------------------------------------------------------------------
      |
      | Here you may configure the symbolic links that will be created when the
      | `storage:link` Artisan command is executed. The array keys should be
      | the locations of the links and the values should be their targets.
      |
     */
    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],
];
