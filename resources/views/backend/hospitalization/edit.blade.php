@extends('backend.template')

@section('content')
<form action="/backend/hospitalization/{{ $hospital->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit living room</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="" hidden>Choose level</option>
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}" {{ $hospital->living->level->id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('level')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="living">Living</label>
                        <select name="living" id="living" class="form-control">
                            <option value="" hidden>Choose living</option>
                            @foreach ($livings as $living)
                            <option value="{{ $living->id }}" {{ $hospital->living_id == $living->id ? 'selected' : '' }}>{{ $living->name }}</option>
                            @endforeach
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