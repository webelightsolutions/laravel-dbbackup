<?php

namespace Webelightdev\LaravelDbBackup\Controllers;

use App\Http\Controllers\Controller;

class DbBackupController extends Controller
{
    public function getBackupStates()
    {
        return view('dbbackup::states');
    }
}
