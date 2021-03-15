@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Levels</h3>
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/living/level/create" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Best</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $level)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $level->name }}</td>
                                <td>Rp. {{ number_format($level->best) }} - Perhari</td>
                                <td>
                                    <a href="/backend/living/level/{{ $level->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="/backend/living/level/delete/{{ $level->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop