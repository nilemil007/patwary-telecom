<?php

namespace App\Providers;

use App\View\Components\MainLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        Blade::component(MainLayout::class, 'main');
        Blade::components([
            MainLayout::class => 'main',
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
