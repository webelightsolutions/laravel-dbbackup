<?php

namespace Webelightdev\LaravelDbBackup\BackupStorage;

class Backup
{
    protected $username;
    protected $password;
    protected $host;
    protected $database;

    public function __construct()
    {
        $this->username = config('dbbackup.database.username');
        $this->password = config('dbbackup.database.password');
        $this->host = config('dbbackup.database.host');
        $this->database = config('dbbackup.database.name');
    }

    public function createBackup()
    {
        $current_date = date('Y-m-d_H-i-s');
        $backup_file = $this->database.'_'.$current_date.'.sql.gz';

        // If mysqldump is on the system path you do not need to specify the full path
        $mysqldump = "mysqldump --databases --host=$this->host --user=$this->username ";

        if ($this->password) {
            $mysqldump .= '--password='.$this->password.' ';
        }

        $mysqldump .= $this->database;
        $mysqldump .= ' | gzip > '.$backup_file;

        // Execute command using system()
        system($mysqldump);

        return $backup_file;
    }
}
