@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Awareness</h3>
                @can ('admin|doctor')
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/outpatient/create" class="btn btn-primary">Add</a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mt-5 text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No reservation</th>
                                <th>Doctor</th>
                                <th>Name patient</th>
                                <th>Date</th>
                                <th>Medical measures</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healths as $health)
                            <tr>
                                @can ('admin|apoteker')
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $health->bookingSchedule->no_reservation }}</td>
                                <td>{{ $health->bookingSchedule->schedule->doctor->name }}</td>
                                <td>{{ $health->bookingSchedule->patient->name }}</td>
                                <td>{{ date('d F Y', $health->date) }}</td>
                                @if ($health->medical_measures == 'ringan')
                                <td>Rawat jalan</td>
                                @else
                                <td>Rawat inap</td>
                                @endif
                                @if ($health->medical_measures == 'ringan')
                                <td>
                                    @can ('admin')
                                    <a href="/backend/outpatient/delete/{{ $health->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                    <a href="/backend/outpatient/read/{{ $health->id }}" class="btn btn-primary ml-1"><i class="fas fa-eye"></i></a>
                                </td>
                                @else
                                <td>
                                    @can ('admin')
                                    <a href="/backend/hospitalization/delete/{{ $health->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                    <a href="/backend/hospitalization/read/{{ $health->id }}" class="btn btn-primary ml-1"><i class="fas fa-eye"></i></a>
                                </td>
                                @endif
                                @endcan

                                @can ('doctor')
                                @if ($health->bookingSchedule->schedule->doctor->id == $doctor->id)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $health->bookingSchedule->no_reservation }}</td>
                                <td>{{ $health->bookingSchedule->schedule->doctor->name }}</td>
                                <td>{{ $health->bookingSchedule->patient->name }}</td>
                                <td>{{ date('d F Y', $health->date) }}</td>
                                @if ($health->medical_measures == 'ringan')
                                <td>Rawat jalan</td>
                                @else
                                <td>Rawat inap</td>
                                @endif
                                @if ($health->medical_measures == 'ringan')
                                <td>
                                    <a href="/backend/outpatient/read/{{ $health->id }}" class="btn btn-primary ml-1"><i class="fas fa-eye"></i></a>
                                </td>
                                @else
                                <td>
                                    <a href="/backend/hospitalization/read/{{ $health->id }}" class="btn btn-primary ml-1"><i class="fas fa-eye"></i></a>
                                </td>
                                @endif
                                @endif
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