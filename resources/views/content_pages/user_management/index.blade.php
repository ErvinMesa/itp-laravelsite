@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div class="table-responsive">
                        <table id="userstable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->role_name}}</td>
                                        <td>
                                            <form id="changeRole{{$user->id}}" method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group mb-4">
                                                <select class="form-control rolecheck" id="{{$user->id}}" name="role">
                                                    @foreach ($roles as $role)
                                                        <option {{($user->user_role==$role->id)?"selected":""}} value="{{$role->id}}">{{$role->role_name}}</option>
                                                    @endforeach
                                                </select>
                                            </form>
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