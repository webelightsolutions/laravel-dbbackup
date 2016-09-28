<?php

namespace Webelightdev\LaravelDbBackup\BackupStorage\GoogleDrive;

use Google_Client;
use Google_Service_Drive;

class Client
{
    protected $client_id;
    protected $client_secret;
    protected $redirect_uri;
    protected $scopes;
    protected $access_type;

    public function __construct()
    {
        $config_path = 'dbbackup.storage.disk.googledrive.';

        $this->client_id = config($config_path.'client_id');
        $this->client_secret = config($config_path.'client_secret');
        $this->redirect_uri = config($config_path.'redirect_uri');
        $this->scopes = config($config_path.'scopes');
        $this->access_type = config($config_path.'access_type');
    }

    public function client()
    {
        $client = new Google_Client();
        $client->setClientId($this->client_id);
        $client->setClientSecret($this->client_secret);
        $client->setRedirectUri($this->redirect_uri);
        $client->setScopes([$this->scopes]);
        $client->setAccessType($this->access_type);

        return $client;
    }

    public function drive($client)
    {
        $drive = new Google_Service_Drive($client);

        return $drive;
    }
}
