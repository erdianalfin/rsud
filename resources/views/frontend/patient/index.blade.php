@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <nav class="navbar navbar-light bg-light mb-5">
                <span class="navbar-brand mb-0 font-weight-bold h1">Patient</span>
                <a href="/patient/booking" class="btn btn-primary">Booking schedule</a>
            </nav>
            <div class="table-responsive">
                <table id="example" class="table table-striped mt-5 text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No rm</th>
                            <th>Name</th>
                            <th>Place, date of birth</th>
                            <th>gender</th>
                            <th>Phone</th>
                            <th>Guarantee</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ patientAccess()->patient->no_rm }}</td>
                            <td>{{ patientAccess()->patient->name }}</td>
                            <td>{{ patientAccess()->patient->city->name }}, {{ date('d F Y', strtotime(patientAccess()->patient->date_of_birth)) }}</td>
                            <td>{{ patientAccess()->patient->gender }}</td>
                            <td>{{ patientAccess()->patient->phone }}</td>
                            <td>{{ patientAccess()->patient->access }}</td>
                            <td>
                                <a href="/patient/delete/{{ patientAccess()->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <a href="/patient/show/{{ patientAccess()->id }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop