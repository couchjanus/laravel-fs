<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StaticPageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);
        // Views
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/cms/pages', 'static-pages');

        // Binding
        $this->app->bind('App\Helpers\Contracts\StaticPage',
            'App\Page');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
