<?php

namespace Webelightdev\LaravelDbBackup\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DbBackupController extends Controller
{
    public function getBackupStates()
    {
        return view('dbbackup::states');
    }
}
