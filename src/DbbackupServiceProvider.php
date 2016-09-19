<?php

namespace Webelightdev\Dbbackup;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;

class DbbackupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        //$this->loadAutoloader(base_path('packages'));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Webelightdev\Dbbackup\Controllers\DbbackupController');
        $this->loadViewsFrom(__DIR__.'/views', 'dbbackup');
    }
}
