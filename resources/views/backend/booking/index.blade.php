@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Booking schedule</h3>
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/booking/create" class="btn btn-primary">Add</a>
                </div>
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
                                <th>Day</th>
                                <th>Status</th>
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
                                @if ($booking->booking_date_expires < time())
                                <td class="font-weight-bold text-danger">Expired</td>
                                @else
                                <td class="font-weight-bold text-success">Active</td>
                                @endif
                                <td>
                                <a href="/backend/booking/show/{{ $booking->id }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="/backend/booking/delete/{{ $booking->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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