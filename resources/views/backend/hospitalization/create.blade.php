@extends('backend.template')

@section('content')
<form action="/backend/hospitalization/store/{{ $health->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Handler</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_handler">Name handler</label>
                        <input type="text" name="name_handler" id="name_handler" class="form-control">
                        @error('name_handler')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_handler">Phone handler</label>
                        <input type="text" name="phone_handler" id="phone_handler" class="form-control">
                        @error('phone_handler')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="job_handler">Job handler</label>
                        <input type="text" name="job_handler" id="job_handler" class="form-control">
                        @error('job_handler')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="address_handler">Name handler</label>
                        <input type="text" name="address_handler" id="address_handler" class="form-control">
                        @error('address_handler')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="family">family</label>
                        <select name="family" id="family" class="form-control">
                            <option value="" hidden>Choose family</option>
                            @foreach ($familys as $family)
                            <option value="{{ $family->id }}">{{ $family->name }}</option>
                            @endforeach
                        </select>
                        @error('family')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Choose living room</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="" hidden>Choose level</option>
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('level')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="living">Living</label>
                        <select name="living" id="living" class="form-control" disabled>
                            <option value="" hidden>Choose living</option>
                        </select>
                        @error('living')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop