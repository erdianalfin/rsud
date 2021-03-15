@extends('backend.template')

@section('content')
<form action="/backend/booking/store" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Patients and poliklinik</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="patient">Patient</label>
                                <select name="patient" id="patient" class="form-control">
                                    <option value="" hidden>Choose patient</option>
                                    @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->no_rm }} ~ {{ $patient->name }}</option>
                                    @endforeach
                                </select>
                                @error('patient')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="poliklinik">Poliklinik</label>
                                <select name="poliklinik" id="poliklinik" class="form-control">
                                    <option value="" hidden>Choose poliklinik</option>
                                    @foreach ($polikliniks as $poliklinik)
                                    <option value="{{ $poliklinik->id }}">{{ $poliklinik->name }}</option>
                                    @endforeach
                                </select>
                                @error('poliklinik')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Schedule</h3>
                </div>
                <div class="card-body">
                    
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th  class="text-center">Check</th>
                                <th>Name Doctor</th>
                                <th>Day</th>
                                <th>Start Hours</th>
                                <th>Hours Completed</th>
                                <th>Poliklinik</th>
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
    </div>
</form>
@stop