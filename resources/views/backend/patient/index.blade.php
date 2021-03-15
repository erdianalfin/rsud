@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Patients</h3>
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/patient/create" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>No rm</th>
                                <th>Name</th>
                                <th>Place, date of birth</th>
                                <th>gender</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if (!is_null($patient->nik))
                                <td>{{ $patient->nik }}</td>
                                @else
                                <td> - </td>
                                @endif
                                <td>{{ $patient->no_rm }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->city->name }}, {{ date('d F Y', strtotime($patient->date_of_birth)) }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>
                                    <a href="/backend/patient/{{ $patient->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="/backend/patient/delete/{{ $patient->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    <a href="/backend/patient/show/{{ $patient->id }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
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