@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hospitalizations</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mt-5 text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No hospitalization</th>
                                <th>Name patient</th>
                                <th>Living</th>
                                <th>Building</th>
                                <th>Entry date</th>
                                <th>Exit date</th>
                                @can ('admin|apoteker')
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hospitals as $hospital)
                            <tr>
                                @can ('admin|apoteker')
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hospital->no_hospitalization }}</td>
                                <td>{{ $hospital->healthCheckup->bookingSchedule->patient->name }}</td>
                                <td>{{ $hospital->living->name }}</td>
                                <td>{{ $hospital->living->building->name }}</td>
                                <td>{{ date('d F Y', $hospital->entry_date) }}</td>
                                @endcan
                                @can ('doctor')
                                @if ($hospital->healthCheckup->bookingSchedule->schedule->doctor->id == $doctor->id)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hospital->no_hospitalization }}</td>
                                <td>{{ $hospital->healthCheckup->bookingSchedule->patient->name }}</td>
                                <td>{{ $hospital->living->name }}</td>
                                <td>{{ $hospital->living->building->name }}</td>
                                <td>{{ date('d F Y', $hospital->entry_date) }}</td>
                                @endif
                                @endcan
                                @if (is_null($hospital->exit_date))
                                <td> - </td>
                                @else
                                <td>{{ date('d F Y', $hospital->exit_date) }}</td>
                                @endif
                                @can ('admin|apoteker')
                                <td>
                                    @can ('admin')
                                    <a href="/backend/hospitalization/delete/{{ $hospital->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                    <a href="/backend/hospitalization/show/{{ $hospital->id }}" class="btn btn-primary ml-1"><i class="fas fa-eye"></i></a>
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