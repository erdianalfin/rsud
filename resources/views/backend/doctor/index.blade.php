@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Doctors</h3>
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/doctor/create" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>License Number</th>
                                <th>Name</th>
                                <th>Specialist</th>
                                <th>Departement</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $doctor->nik }}</td>
                                <td>{{ $doctor->license_number }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->specialist->name }}</td>
                                <td>{{ $doctor->departement->name }}</td>
                                <td>
                                    <a href="/backend/doctor/{{ $doctor->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="/backend/doctor/delete/{{ $doctor->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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