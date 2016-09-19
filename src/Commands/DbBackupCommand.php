<?php

namespace Webelightdev\LaravelDbBackup\Commands;

use Illuminate\Console\Command;

class DbBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dbbackup:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Database backup.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username = config('dbbackup.database.username');
        $password = config('dbbackup.database.password');
        $host     = config('dbbackup.database.host');
        $database = config('dbbackup.database.name');

        $current_date = date("Y-m-d_H-i-s");

        $backup_name = $database."_".$current_date.".sql.gz";

        // if mysqldump is on the system path you do not need to specify the full path
        $command = "mysqldump --databases --host=$host --user=$username ";

        if ($password) {
            $command.= "--password=". $password ." ";
        }

        $command.= $database;
        $command.= " | gzip > ".$backup_name;

        // Execute command using system()
        system($command);
        
        // \Mail::send('emails.db_backup_email', compact('current_date'), function ($message) use ($current_date, $dumpfname) {
        //     $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
        //     $message->to(env('MAIL_TO'))->subject('ERP System DB Backup-'.$current_date)->attach($dumpfname);
        // });
        // unlink($dumpfname);
    }
}
