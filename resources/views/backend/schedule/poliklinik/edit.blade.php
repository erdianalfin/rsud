@extends('backend.template')

@section('content')
<form action="/backend/schedule/poliklinik/{{ $poliklinik->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit poliklinik</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $poliklinik->name }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="/img/poliklinik/{{ $poliklinik->image }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop