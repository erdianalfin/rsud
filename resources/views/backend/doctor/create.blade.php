@extends('backend.template')

@section('content')
<form action="/backend/doctor/store" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Doctor</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="license_number">License Number</label>
                                <input type="text" class="form-control" name="license_number" id="license_number" value="{{ old('license_number') }}">
                                @error('license_number')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="nik">Nik</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik') }}">
                                @error('nik')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="alumni">alumni</label>
                                <input type="text" class="form-control" name="alumni" id="alumni" value="{{ old('alumni') }}">
                                @error('alumni')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="mobile_phone">Mobile Phone</label>
                                <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" value="{{ old('mobile_phone') }}">
                                @error('mobile_phone')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="specialist">Specialist</label>
                                <select name="specialist" id="specialist" class="form-control">
                                    <option value="" hidden>Choose specialist</option>
                                    @foreach ($specialists as $specialist)
                                    <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                                    @endforeach
                                </select>
                                @error('specialist')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="departement">Departement</label>
                                <select name="departement" id="departement" class="form-control">
                                    <option value="" hidden>Chooser departement</option>
                                    @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                    @endforeach
                                </select>
                                @error('departement')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop