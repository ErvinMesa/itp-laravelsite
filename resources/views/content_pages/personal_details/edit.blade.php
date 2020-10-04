@extends('layouts.app')

<style>

</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="card-title">Name</h4>
                            <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <h4 class="card-title">Email</h4>
                            <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-2">
                            <h4 class="card-title">Contact No.</h4>
                            <div class="form-group">
                            <input type="text" class="form-control" name="contact" value="{{$user->profile->contact}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title">Quote</h4>
                            <div class="form-group">
                            <input type="text" class="form-control" name="quote" value="{{$user->profile->quote}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">Address</h4>
                            <div class="form-group">
                            <textarea class="form-control" rows="2" name="address">{{$user->profile->address}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-11 col-1">
                            <input class="btn btn-lg btn-success" type="submit" value="Save">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection