<?php

namespace Sara\Translate;

use Illuminate\Support\ServiceProvider;

class TranslatorServiceProvider extends ServiceProvider
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        // register our controller
        $this->app->make('Sara\Translate\Http\Controllers\TranslateController');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'translator');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

//        $this->loadTranslationsFrom(__DIR__.'/path/to/translations', 'courier');

        $this->publishes([
            __DIR__.'/assets' => public_path('assets'),
        ], 'public');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';



    }
}
