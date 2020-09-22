@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Barangay</h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <form class="w-100" action="/barangay" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <h5 class="card-title">Name</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="bname" required>
                                </div>
                                @error('cmdesc')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-2">
                            <h5 class="card-title">Latitude</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="latitude" required>
                                </div>
                                @error('latitude')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-2">
                            <h5 class="card-title">Longitude</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="longitude" required>
                                </div>
                                @error('longitude')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-3">
                                <h4 class="card-title">City/Municipality</h4>
                                <div class="form-group mb-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="idcm">
                                        @foreach ($citymuns as $citymun)
                                            <option value="{{$citymun->id}}">{{$citymun->cmdesc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <h5 class="card-title">Estimated Population</h5>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="estpop" required>
                                    </div>
                                    @error('estpop')
                                            <strong>{{ $message }}</strong>
                                    @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col">
                                <h4 class="card-title">Remarks</h4>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="remarks"></textarea>
                                </div>
                                @error('remarks')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="offset-10 col-2">
                                <input class="btn btn-success btn-lg" id="Form" type="submit" value="Save">
                                <input class="btn btn-info btn-lg" type="button" value="Listing">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection