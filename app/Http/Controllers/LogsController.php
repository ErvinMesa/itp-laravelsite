<?php

namespace App\Http\Controllers;

use App\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index(){
        $logs = Logs::select()->get();
        return view('content_pages.logs.index',['logs'=>$logs]);
    }
}
