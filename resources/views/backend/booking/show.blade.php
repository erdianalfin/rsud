@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Patient</h3>
            </div>
            <div class="card-body">
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
    <div class="col-lg-4">
        @if (is_null($insurance))
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guarantee</h3>
            </div>
            <div class="card-body">
                <form action="/backend/booking/store/insurance" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="no_reservation">No reservasion</label>
                        <input type="text" id="no_reservation" name="no_reservation" value="{{ $booking->no_reservation }}" class="form-control" readonly>
                        @error('no_reservation')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="access">access</label>
                        <select name="access" id="access" class="form-control">
                            <option value="personal">Personal</option>
                            @foreach ($guarantees as $guarantee)
                            <option value="{{ $guarantee->id }}">{{ $guarantee->name }} (insurance)</option>
                            @endforeach
                        </select>
                        @error('access')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="forn-group">
                        <label for="card_number">Card number</label>
                        <input type="text" name="card_number" id="card_number" class="form-control">
                        @error('card_number')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary mt-3 float-right">Save</button>
                </form>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guarantee</h3>
            </div>
            <div class="card-body">
                <form action="/backend/booking/insurance/{{ $insurance->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="no_reservation">No reservasion</label>
                        <input type="text" id="no_reservation" name="no_reservation" value="{{ $booking->no_reservation }}" class="form-control" readonly>
                        @error('no_reservation')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="access">access</label>
                        <select name="access" id="access" class="form-control">
                            <option value="personal" {{ $insurance->access == 'personal' && $insurance->guarantee_id == null ? 'selected' : '' }}>Personal</option>
                            @foreach ($guarantees as $guarantee)
                            <option value="{{ $guarantee->id }}" {{ $insurance->guarantee_id == $guarantee->id ? 'selected' : '' }}>{{ $guarantee->name }} (insurance)</option>
                            @endforeach
                        </select>
                        @error('access')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="forn-group">
                        <label for="card_number">Card number</label>
                        <input type="text" name="card_number" id="card_number" value="{{ $insurance->card_number }}" class="form-control">
                        @error('card_number')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary mt-3 float-right">Edit</button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@stop