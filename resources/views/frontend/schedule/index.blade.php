@extends('frontend.template')

@section('content')
<div class="container">
    <h2 class="font-weight-bold text-primary text-center mt-5">" Doctor schedule {{ $poliklinik->name }} "</h2>
    <div class="row mt-5">
        @foreach ($schedules as $schedule)
        <div class="col-lg-3">
            <form action="/doctor/schedule/booking/store/{{ $schedule->id }}" method="post">
                @csrf
                @method('post')
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <img src="/img/user/default/default.svg" alt="" class="w-50  text-center">
                        <h4 class="font-weight-bold mt-4 text-primary">{{ $schedule->doctor->name }}</h4>
                        <table class="table-striped mt-5 table text-left">
                            <thead>
                                <tr>
                                    <td class="font-weight-bold">Day</td>
                                    <td>:</td>
                                    <td>{{ $schedule->day->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Start hours</td>
                                    <td>:</td>
                                    <td>{{ $schedule->start_hours }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Hours Completed</td>
                                    <td>:</td>
                                    <td>{{ $schedule->hours_completed }}</td>
                                </tr>
                            </thead>
                        </table>
                        @if(Auth::check())
                        @if (!is_null(patientAccess()))
                        <button class="btn btn-primary btn-block text-center" style="border-radius: 15px;">Booking</button>
                        @endif
                        @endif
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@stop