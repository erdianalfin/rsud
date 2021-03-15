@extends('backend.template')

@section('content')
<form action="/backend/doctor/access/store" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Doctor Access</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="text" class="form-control" name="license_number" id="license_number" value="{{ old('license_number') }}">
                        @error('license_number')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@stop