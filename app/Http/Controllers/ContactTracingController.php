<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use \App\CityMun;
class ContactTracingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('content_pages.contact_tracing.create');
    }
    public function index()
    {
        $citymuns = CityMun::select()->get();
        return view('content_pages.contact_tracing.index', 
            ['citymuns'=>$citymuns]
        );
    }
    public function store(){
        $data = request()->validate([
            'cmdesc' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'cmclass' => 'required',
            'remarks' => 'nullable'
        ]);
        CityMun::create($data);
        return redirect('/ctracing/index');
    }
    public function delete($citymun){
        CityMun::find($citymun)->delete();
        return redirect('/ctracing/index');
    }
}
