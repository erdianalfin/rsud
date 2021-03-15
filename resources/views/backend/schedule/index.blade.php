@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Doctor's schedule</h3>
                @can ('admin')
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/schedule/create" class="btn btn-primary">Add</a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name Doctor</th>
                                <th>Day</th>
                                <th>Start Hours</th>
                                <th>Hours Completed</th>
                                <th>Poliklinik</th>
                                <th>Price</th>
								@can ('admin')
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedule->doctor->name }}</td>
                                <td>{{ $schedule->day->name }}</td>
                                <td>{{ $schedule->start_hours }}</td>
                                <td>{{ $schedule->hours_completed }}</td>
                                <td>{{ $schedule->poliklinik->name }}</td>
                                <td>Rp. {{ number_format($schedule->price) }}</td>
								@can ('admin')
                                <td>
                                    <a href="/backend/schedule/{{ $schedule->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="/backend/schedule/delete/{{ $schedule->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
</div>
@stop