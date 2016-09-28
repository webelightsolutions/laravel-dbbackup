<?php

namespace Webelightdev\LaravelDbBackup\BackupStorage\GoogleDrive;

use Google_Service_Drive_DriveFile;

class Storage
{
    protected $client;
    protected $drive;
    protected $refresh_token;
    protected $folder_id;

    public function __construct(Client $google_client)
    {
        $this->client = $google_client->client();
        $this->drive = $google_client->drive($this->client);
        $this->refresh_token = config('dbbackup.storage.disk.googledrive.refresh_token');
        $this->folder_id = config('dbbackup.storage.disk.googledrive.backup_folder_id');
    }

    protected function refreshToken()
    {
        $this->client->refreshToken($this->refresh_token);
        $access_token = $this->client->getAccessToken();
        $this->client->setAccessToken($access_token);
    }

    public function uploadFile($backup_file)
    {
        $this->refreshToken();

        $file = new Google_Service_Drive_DriveFile();
        $file->setName($backup_file);
        $file->setParents([$this->folder_id]);

        $data = file_get_contents($backup_file);

        return $this->drive->files->create($file, [
            'data'       => $data,
            'mimeType'   => 'application/octet-stream',
            'uploadType' => 'multipart',
        ]);
    }
}
