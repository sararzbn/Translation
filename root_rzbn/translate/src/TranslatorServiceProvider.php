<?php

namespace root_rzbn\translate;

use Illuminate\Support\ServiceProvider;

class TranslatorServiceProvider extends ServiceProvider
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        // register our controller
        $this->app->make('root_rzbn\translate\Http\Controllers\TranslateController');
        $this->app->make('root_rzbn\translate\Http\Controllers\KeyController');
        $this->app->make('root_rzbn\translate\Http\Controllers\LanguageController');
        $this->app->make('root_rzbn\translate\Http\Controllers\LocaleFileController');
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
