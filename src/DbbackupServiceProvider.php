<?php

namespace Webelightdev\LaravelDbBackup;

use Illuminate\Support\ServiceProvider;
use Webelightdev\LaravelDbBackup\Commands\DbBackupCommand;

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
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Webelightdev\LaravelDbBackup\Controllers\DbBackupController');
        $this->loadViewsFrom(__DIR__.'/views', 'dbbackup');
        $this->publishes([__DIR__.'/../config/dbbackup.php' => config_path('dbbackup.php')]);

        $this->app->bind('command.dbbackup:run', DbBackupCommand::class);

        $this->commands([
            'command.dbbackup:run',
        ]);
    }
}
