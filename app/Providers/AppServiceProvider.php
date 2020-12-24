<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteConfig;
use App\Models\Menu;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            $siteconfig = SiteConfig::first();
           
            View::share([
                'siteconfig' => $siteconfig, 
              
            ]);
        });
       
    }
}
