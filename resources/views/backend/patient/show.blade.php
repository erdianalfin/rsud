@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pasient</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nik</th>
                            <td width="20px">:</td>
                            @if (!is_null($patient->nik))
                            <td>{{ $patient->nik }}</td>
                            @else 
                            <td> - </td>
                            @endif
                        </tr>
                        <tr>
                            <th>No. rm</th>
                            <td width="20px">:</td>
                            <td>{{ $patient->no_rm }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td width="20px">:</td>
                            <td>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Place, date of birth</th>
                            <td width="20px">:</td>
                            <td>{{ $patient->city->name }}, {{ date('d F Y', strtotime($patient->date_of_birth)) }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td width="20px">:</td>
                            <td>{{ $patient->gender }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td width="20px">:</td>
                            <td>{{ $patient->phone }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@stop