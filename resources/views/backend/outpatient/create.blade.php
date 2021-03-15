@extends('backend.template')

@section('content')
<div class="row">
    @can ('admin')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Poliklinik</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="poliklinik">Poliklinik</label>
                    <select name="poliklinik" id="polikliniks" class="form-control">
                        <option value="" hidden>Choose poliklinik</option>
                        @foreach ($polikliniks as $poliklinik)
                        <option value="{{ $poliklinik->id }}">{{ $poliklinik->name }}</option>
                        @endforeach
                    </select>
                    @error('poliklinik')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Booking schedule</h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>No rm</th>
                                <th>Name</th>
                                <th>Place, date of birth</th>
                                <th>gender</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="schedule">
                        </tbody>
                    </table>
                </div>
                @error('schedule')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    @endcan
    @can ('doctor')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add awareness</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped mt-5 text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Poliklinik</th>
                            <th>Day</th>
                            <th>No rm</th>
                            <th>Name</th>
                            <th>gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        @if ($booking->schedule->doctor->id == $doctor->id)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->schedule->poliklinik->name }}</td>
                            <td>{{ $booking->schedule->day->name }}</td>
                            <td>{{ $booking->patient->no_rm }}</td>
                            <td>{{ $booking->patient->name }}</td>
                            <td>{{ $booking->patient->gender }}</td>
                            <td>
                                <a href="/backend/outpatient/show/{{ $booking->id }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endcan
</div>
@stop