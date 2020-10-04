<?php

namespace App\Http\Controllers;

use App\Logs;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.permissions:2');
    }
    public function index()
    {
        return view('content_pages.scanner.index');
    }
    public function store(User $user){
        $data = request()->validate([
            'scanned_user_id'=>'required',
        ]);
        $data['scanning_user_id'] = $user->id;
        Logs::create($data);
        return redirect()->route('scan.show',['user'=>$user->id]);
    }
}
