<?php

namespace App\Http\Controllers;

use App\Barangay;
use App\CityMun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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

    public function edit(CityMun $citymun){
        return view('content_pages.contact_tracing.edit',compact('citymun'));
    }

    public function update(CityMun $citymun){
        $citymundata = request()->validate([
            'cmdesc' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'cmclass' => 'required',
            'remarks' => 'nullable'
        ]);
        $citymun->update($citymundata);
        return redirect("/ctracing/edit/$citymun->id");
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
        \App\Barangay::select()->where('idcm',$citymun)->delete();
        return redirect('/ctracing/index');
    }
    public function tabledata(){
        $citymundata = \App\CityMun::select('id','cmdesc','latitude','longitude','cmclass')->get()->map(function($data){
            $edit = "<a href='/ctracing/edit/$data->id' class='btn btn-info'>edit</a> ";
            $delete = "<a href='/ctracing/$data->id' class='btn btn-danger'>delete</a>";
            return [
                $data->cmdesc,
                $data->latitude,
                $data->longitude,
                $data->cmclass,
                $edit.$delete,
            ];
        });
        return response()->json(["data"=>$citymundata]);
    }

    public function citymundata($data){
        $citymundata = \App\CityMun::find($data);
        return response()->json($citymundata);
    }
}
