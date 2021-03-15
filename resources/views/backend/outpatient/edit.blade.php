@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Health checkup</h3>
            </div>
            <div class="card-body">
                <form action="/backend/outpatient/{{ $outpatient->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="complaints">Complaints</label>
                        <textarea name="complaints" id="complaints" rows="3" class="form-control">{{ $outpatient->complaints }}</textarea>
                        @error('complaints')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="action">Action</label>
                        <textarea name="action" id="action" rows="3" class="form-control">{{ $outpatient->action }}</textarea>
                        @error('action')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <button class="btn btn-primary float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop