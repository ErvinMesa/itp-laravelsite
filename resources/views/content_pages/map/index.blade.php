@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <h3 class="text-themecolor mb-0">Map Page</h3>
                <ol class="breadcrumb mb-0 p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Map Page</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col">
                <div id="mapid"></div>
            </div>
        </div>
        <div class="row">
            <div class="offset-8 col-2 mt-4">
                <div class="form-group mb-4">
                    <select class="form-control" name="Display" id="MapDisplay">
                        <option value="all">All</option>
                        <option value="citymuns">City/Municipalities</option>
                        <option value="barangays">Barangays</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection