@extends('layouts.app')

<style>

</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="{{asset("images/self1.jpg")}}" class="rounded-circle" height="150" width="150" />
                    <h4 class="card-title mt-2">{{$user->name}}</h4>
                        <h6 class="card-subtitle">Student</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-2"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-2"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>{{$user->email}}</h6><small class="text-muted pt-4 db">Phone</small>
                    <h6>{{$user->profile->contact}}</h6> <small class="text-muted pt-4 db">Address</small>
                    <h6>{{$user->profile->address}}</h6>
                    <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1960.6450691407404!2d122.9304404335273!3d10.63455334138668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aecfc52dda8ac9%3A0x5fa412aedb94301a!2sJose%20Abad%20Santos%20Street%2C%20Bacolod%2C%20Negros%20Occidental!5e0!3m2!1sen!2sph!4v1597853791002!5m2!1sen!2sph" width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Description</small>
                            <p>
                                {{$user->profile->quote}}
                            </p>
                        </div>
                        <div class="offset-5 col-1">
                            <canvas id="qr"></canvas>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-4">
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                        </div>
                        <div class="col-7"></div>
                        <div class="col-1">
                            <a href="/edit" class="btn btn-secondary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection