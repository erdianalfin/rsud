@extends('backend.template')

@section('content')
<form action="/backend/patient/{{ $patient->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit patient</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="question">question</label>
                                <select name="question" id="question" class="form-control">
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nik">Nik</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="{{ $patient->nik }}">
                                @error('nik')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $patient->name }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Place of birth</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="province" id="province" class="form-control">
                                    <option value="" hidden>Choose province</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ $patient->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <select name="city" id="city" class="form-control">
                                    <option value="" hidden>Choose city</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $patient->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }} ({{ $city->type }})</option>
                                    @endforeach
                                </select>
                                @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ $patient->date_of_birth }}">
                        @error('date_of_birth')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="" hidden>Choose gender</option>
                            <option value="Laki-laki" {{ $patient->gender == 'Laki-laki' ? 'selected' : '' }}>Laki - laki</option>
                            <option value="Perempuan" {{ $patient->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $patient->address }}">
                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $patient->phone }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop