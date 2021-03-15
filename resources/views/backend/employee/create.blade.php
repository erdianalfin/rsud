@extends('backend.template')

@section('content')
<form action="/backend/employee/store" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Employee</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="npwp">Npwp</label>
                        <input type="text" class="form-control" name="npwp" id="npwp" value="{{ old('npwp') }}">
                        @error('npwp')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <select name="position" id="position" class="form-control">
                            <option value="" hidden>Choose position</option>
                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        @error('position')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="departement">Departement</label>
                        <select name="departement" id="departement" class="form-control">
                            <option value="" hidden>Choose departement</option>
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
</form>
@stop