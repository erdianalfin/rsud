@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <form action="/patient/register/store" method="post">
    @csrf
    @method('post')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <span class="navbar-brand mb-0 font-weight-bold h1">Patient</span>
                    </nav>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="question">Apakah Anda Sudah Mempunyai Ktp ?</label>
                                <select name="question" id="question" class="form-control">
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nik">Nik</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik') }}">
                                @error('nik')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Place of birth</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="province" id="province" class="form-control">
                                    <option value="" hidden>Choose province</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <select name="city" id="city" class="form-control" disabled>
                                    <option value="" hidden>Choose city</option>
                                </select>
                                @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" name="date_of_birth" class="form" id="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mt-2">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" hidden>Choose gender</option>
                                    <option value="Laki-laki">Laki - laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('gender')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop