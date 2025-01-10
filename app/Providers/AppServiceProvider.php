<?php

namespace App\Providers;

use App\Http\Controllers\userDetails;
use App\Models\vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $base_url = 'http://127.0.0.1:8000';
        $image_base_url = 'http://127.0.0.1:8000';

        if (config('app.env') == 'production') {
            $base_url = 'https://nagadhat.com.bd';
            $image_base_url = 'https://nagadhat.com.bd/public';
        }
        if (config('app.env') == 'cloudways_staging') {
            $base_url = 'https://staging.nagadhat.com.bd';
            $image_base_url = 'https://staging.nagadhat.com.bd';
        }
        if (config('app.env') == 'cloudways_production') {
            $base_url = 'https://nagadhat.com.bd';
            $image_base_url = 'https://nagadhat.com.bd';
        }

        // This $publicURL will share with all views in this project
        View()->share('publicURL', $base_url);
        // This $publicURL will share with all views in this project
        View()->share('imageLoadingUrl', $image_base_url . "/storage/");

        view()->composer('*', function () {
            // Get User Details
            if (auth()->user()) {
                $userDetails = vendor::find(auth()->user()->userToVendor->id);
                View()->share('userDetails', $userDetails);
            }
        });
    }
}
