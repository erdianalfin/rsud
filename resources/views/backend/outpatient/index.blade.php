@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Outpatients</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mt-5 text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No reservation</th>
                                <th>Poliklinik</th>
                                <th>Doctor</th>
                                <th>Name patient</th>
                                <th>Date</th>
                                @can ('admin|apoteker')
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outs as $out)
                            <tr>
                                @can ('admin|apoteker')
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $out->bookingSchedule->no_reservation }}</td>
                                <td>{{ $out->bookingSchedule->poliklinik->name }}</td>
                                <td>{{ $out->bookingSchedule->schedule->doctor->name }}</td>
                                <td>{{ $out->bookingSchedule->patient->name }}</td>
                                <td>{{ date('d F Y', $out->date) }}</td>
                                @endcan
                                @can ('doctor')
                                @if ($out->bookingSchedule->schedule->doctor->id == $doctor->id)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $out->bookingSchedule->no_reservation }}</td>
                                <td>{{ $out->bookingSchedule->poliklinik->name }}</td>
                                <td>{{ $out->bookingSchedule->schedule->doctor->name }}</td>
                                <td>{{ $out->bookingSchedule->patient->name }}</td>
                                <td>{{ date('d F Y', $out->date) }}</td>
                                @endif
                                @endcan
                                @can ('admin|apoteker')
                                <td>
                                    @can ('admin')
                                    <a href="/backend/outpatient/delete/{{ $out->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                    <a href="/backend/outpatient/read/{{ $out->id }}" class="btn btn-primary ml-1"><i class="fas fa-eye"></i></a>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop