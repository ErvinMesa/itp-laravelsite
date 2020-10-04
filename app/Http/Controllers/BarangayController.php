<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Barangay;
class BarangayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $citymuns = \App\CityMun::select()->get();
        return view('content_pages.barangay.create',[
                'citymuns'=>$citymuns
            ]);
    }

    public function index()
    {
        $barangay = Barangay::select()->get();
        return view('content_pages.barangay.index', 
            ['barangays'=>$barangay]
        );
    }

    public function store(){
        $data = request()->validate([
            'bname' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'idcm' => 'required',
            'estpop' => 'required',
            'remarks' => 'nullable'
        ]);
        \App\Barangay::create($data);
        return redirect('/barangay/index');
    }
    
    public function delete($barangay){
        Barangay::find($barangay)->delete();
        return redirect('/barangay/index');
    }
}
