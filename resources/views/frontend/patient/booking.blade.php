@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <nav class="navbar navbar-light bg-light mb-5">
                <span class="navbar-brand mb-0 font-weight-bold h1">Booking schedules</span>
            </nav>
            <div class="table-responsive">
                <table id="example" class="table table-striped mt-5 text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No reservation</th>
                            <th>Poliklinik</th>
                            <th>Doctor</th>
                            <th>Name patient</th>
                            <th>Day</th>
                            <th>Start hours</th>
                            <th>hours completed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->no_reservation }}</td>
                            <td>{{ $booking->schedule->poliklinik->name }}</td>
                            <td>{{ $booking->schedule->doctor->name }}</td>
                            <td>{{ $booking->patient->name }}</td>
                            <td>{{ $booking->schedule->day->name }}</td>
                            <td>{{ $booking->schedule->start_hours }}</td>
                            <td>{{ $booking->schedule->hours_completed }}</td>
                            <td>
                                <a href="/booking/confirm/{{ $booking->id }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop