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
                    <h4 class="card-title">Logs</h4>
                    <div class="table-responsive">
                        <table id="logstable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Scanner</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($logs as $log): ?>
                                    <tr>
                                        <td>{{$log->scanned_user->name}}</td>
                                        <td>{{$log->scanning_user->name}}</td>
                                        <td>{{$log->created_at}}</td>
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