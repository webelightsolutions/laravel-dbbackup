<?php

namespace Webelightdev\LaravelDbBackup\Commands;

use Illuminate\Console\Command;
use Webelightdev\LaravelDbBackup\BackupStorage\Backup;
use Webelightdev\LaravelDbBackup\BackupStorage\GoogleDrive\Storage;

class DbBackupCommand extends Command
{
    protected $backup;
    protected $storage;

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
    public function __construct(Backup $backup, Storage $storage)
    {
        parent::__construct();
        $this->backup = $backup;
        $this->storage = $storage;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $backup_file = $this->backup->createBackup();
        $this->storage->uploadFile($backup_file);

        // \Mail::send('emails.db_backup_email', compact('current_date'), function ($message) use ($current_date, $dumpfname) {
        //     $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
        //     $message->to(env('MAIL_TO'))->subject('ERP System DB Backup-'.$current_date)->attach($dumpfname);
        // });
        unlink($backup_file);
    }
}
