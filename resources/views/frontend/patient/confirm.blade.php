@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <span class="navbar-brand mb-0 font-weight-bold h1">Konfirmasi</span>
                        <a href="/patient/booking" class="btn btn-danger float-right"><i class="fa fa-angle-left"></i> Back</a>
                    </nav>
                    <div class="alert text-center alert-success">Silahkan melakukan konfirmasi ke pendaftaran yang ada di rumah sakit kami sebelum melakukan pertemuan dengan dokter</div>
                    <div class="table-responsive">
                        <table class="table table-striped mt-3 text-nowrap w-100">
                            <thead>
                                <tr>
                                    <td class="font-weight-bold">No reservation</td>
                                    <td>:</td>
                                    <td>{{ $booking->no_reservation }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Poliklinik</td>
                                    <td>:</td>
                                    <td>{{ $booking->schedule->poliklinik->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Doctor</td>
                                    <td>:</td>
                                    <td>{{ $booking->schedule->doctor->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Name Patient</td>
                                    <td>:</td>
                                    <td>{{ $booking->patient->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Day</td>
                                    <td>:</td>
                                    <td>{{ $booking->schedule->day->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Start hours</td>
                                    <td>:</td>
                                    <td>{{ $booking->schedule->start_hours }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Hours completed</td>
                                    <td>:</td>
                                    <td>{{ $booking->schedule->hours_completed }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop