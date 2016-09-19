<?php

namespace Webelightdev\Dbbackup\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DbbackupController extends Controller
{
    public function getBackupStates()
    {
        return view('dbbackup::states');
    }
}
