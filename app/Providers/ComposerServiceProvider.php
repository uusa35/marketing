<?php

namespace App\Providers;

use App\Http\Controllers\App\Services\ViewComposers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // backend
//        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@setTokenElement');

    }

    /**
     * automatically composer() method will be registered
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}
