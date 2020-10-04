@extends('layouts.app')

<style>

</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/scan/record">
                    <video id="scanner">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-5 col-2">
            <button class="btn btn-info" id="startScan">Scan</button>
            <button class="btn btn-info" id="stopScan">Stop</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-4 col-4">
            <form action="/scan/{{Auth::user()->id}}" method="POST">
                @csrf
                <h4 class="card-title">Manual Input</h4>
                <div class="form-group">
                    <input type="text" class="form-control required" name="scanned_user_id">
                </div>
                <input class="btn btn-info" id="Form" type="submit" value="Log">
            </form>
        </div>
    </div>
</div>
@endsection