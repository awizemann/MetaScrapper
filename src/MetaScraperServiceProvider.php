<?php

namespace awizemann\metascraper;

use Illuminate\Support\ServiceProvider;

class MetaScraperServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
       
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/metascraper.php', 'metascraper');

        // Register the service the package provides.
        $this->app->singleton('metascraper', function ($app) {
            return new MetaScraper;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['metascraper'];
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
            __DIR__.'/../config/metascraper.php' => config_path('metascraper.php'),
        ], 'metascraper.config');
    }
}
