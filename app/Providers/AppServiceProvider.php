<?php

namespace estoque\Providers;
use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;

use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Request $request)
    {
         view()->share('userName', 'Admin');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
