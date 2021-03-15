@extends('backend.template')

@section('content')
<form action="/backend/schedule/{{ $schedule->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit doctor schedule</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="doctor">Doctor</label>
                        <select name="doctor" id="doctor" class="form-control">
                            <option value="" hidden>Choose doctor</option>
                            @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $doctor->id == $schedule->doctor_id ? 'selected' : '' }}>{{ $doctor->license_number }} ~ {{ $doctor->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="day">Day</label>
                        <select name="day" id="day" class="form-control">
                            <option value="" hidden>Choose day</option>
                            @foreach ($days as $day)
                            <option value="{{ $day->id }}" {{ $day->id == $schedule->day_id ? 'selected' : '' }}>{{ $day->name }}</option>
                            @endforeach
                        </select>
                        @error('day')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="start_hours">Start hours</label>
                        <input type="time" class="form-control" name="start_hours" id="start_hours" value="{{ $schedule->start_hours }}">
                        @error('start_hours')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="hours_completed">Hours completed</label>
                        <input type="time" class="form-control" name="hours_completed" id="hours_completed" value="{{ $schedule->hours_completed }}">
                        @error('hours_completed')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="poliklinik">Poliklinik</label>
                        <select name="poliklinik" id="poliklinik" class="form-control">
                            <option value="" hidden>Choose poliklinik</option>
                            @foreach ($polikliniks as $poliklinik)
                            <option value="{{ $poliklinik->id }}" {{ $poliklinik->id == $schedule->poliklinik_id ? 'selected' : '' }}>{{ $poliklinik->name }}</option>
                            @endforeach
                        </select>
                        @error('poliklinik')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $schedule->price }}">
                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
     

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop