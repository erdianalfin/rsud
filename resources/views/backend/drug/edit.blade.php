@extends('backend.template')

@section('content')
<form action="/backend/drug/{{ $drug->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit drug</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $drug->name }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $drug->price }}">
                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="" hidden>Chooser Type</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $drug->drug_type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" name="stok" id="stok" value="{{ $drug->stok }}">
                        @error('stok')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@stop