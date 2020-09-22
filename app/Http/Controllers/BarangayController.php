<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function create()
    {
        return view('content_pages.barangay.create');
    }
    public function store(){
        $data = request()->validate([
            'bname' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'idcm' => 'required',
            'remarks' => 'nullable'
        ]);

        \App\Barangay::create($data);
        return redirect('/barangay');
    }
}
