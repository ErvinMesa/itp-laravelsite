@extends('layouts.app')

@section('content')
<style>
    .table tbody+tbody{
        border-top: none;
    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Barangay</h4>
                    <a href="/barangay" class="btn btn-primary mb-2">Add</a>
                    <div class="table-responsive">
                        <table id="barangaytable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Est. Population</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($barangays as $barangay): ?>
                                    <tr>
                                        <td>{{$barangay->bname}}</td>
                                        <td>{{$barangay->citymun->cmdesc}}</td>
                                        <td>{{$barangay->latitude}}</td>
                                        <td>{{$barangay->longitude}}</td>
                                        <td>{{$barangay->estpop}}</td>
                                        <td>
                                            <a href="{{url("/barangay/".$barangay->id)}}" class="btn btn-info">edit</a>
                                            <a href="{{url("/barangay/".$barangay->id)}}" class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection