@extends('backend.template')

@section('content')
<form action="/backend/living/{{ $living->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit living type</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $living->name }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="amount_bed">Amount bed</label>
                        <input type="text" class="form-control" name="amount_bed" id="amount_bed" value="{{ $living->amount_bed }}">
                        @error('amount_bed')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="" hidden>Chooser level</option>
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}" {{ $level->id == $living->level_id ? 'selected' : '' }}>{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('level')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="building">Building</label>
                        <select name="building" id="building" class="form-control">
                            <option value="" hidden>Choose building</option>
                            @foreach ($buildings as $building)
                            <option value="{{ $building->id }}" {{ $building->id == $living->building_id ? 'selected' : '' }}>{{ $building->name }}</option>
                            @endforeach
                        </select>
                        @error('building')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop