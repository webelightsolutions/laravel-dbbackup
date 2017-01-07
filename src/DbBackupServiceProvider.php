<?php

namespace Webelightdev\LaravelDbBackup;

use Illuminate\Support\ServiceProvider;
use Webelightdev\LaravelDbBackup\Commands\DbBackupCommand;

class DbBackupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([__DIR__.'/../config/dbbackup.php' => config_path('dbbackup.php')]);
        $this->app->bind('command.run:dbbackup', DbBackupCommand::class);
        $this->commands([
            'command.run:dbbackup',
        ]);
    }
}
