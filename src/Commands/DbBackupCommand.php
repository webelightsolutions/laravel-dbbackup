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
    protected $signature = 'run:dbbackup';

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
        unlink($backup_file);
    }
}
