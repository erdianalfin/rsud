@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Facility</h3>
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/listing/show/{{ $listing->id }}" class="btn btn-danger">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="/backend/listing/facility/store/{{ $listing->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="thumbnail">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        @error('thumbnail')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" placeholder="Text ..." class="form-control">
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea name="description" id="description" class="form-control summernote-simple"></textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary btn-sm float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@stop