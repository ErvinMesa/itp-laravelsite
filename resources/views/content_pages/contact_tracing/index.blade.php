@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cities and Municipalities</h4>
                    <a href="/ctracing" class="btn btn-primary mb-2">Add</a>
                    <div class="table-responsive">
                        <table id="ctracing" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($citymuns as $citymun): ?>
                                    <tr>
                                        <td><?= $citymun->cmdesc?></td>
                                        <td><?= $citymun->latitude?></td>
                                        <td><?= $citymun->longitude?></td>
                                        <td><?= $citymun->cmclass?></td>
                                        <td>
                                            <div>
                                                <a href="{{url("/ctracing/".$citymun->id)}}" class="btn btn-info">edit</a>
                                                <a href="{{URL::to("/ctracing/".$citymun->id)}}" class="btn btn-danger" value="delete">delete</a>
                                            </div>
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