<?php

namespace rookmoot\MetaScrapper;

use Illuminate\Support\ServiceProvider;

class MetaScrapperServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'hojabbr');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'hojabbr');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/metascrapper.php', 'metascrapper');

        // Register the service the package provides.
        $this->app->singleton('metascrapper', function ($app) {
            return new MetaScrapper;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['metascrapper'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/metascrapper.php' => config_path('metascrapper.php'),
        ], 'metascrapper.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/hojabbr'),
        ], 'metascrapper.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/hojabbr'),
        ], 'metascrapper.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/hojabbr'),
        ], 'metascrapper.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
