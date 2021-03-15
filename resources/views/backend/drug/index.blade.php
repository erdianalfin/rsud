@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Drug</h3>
                @can ('admin|apoteker')
                <div class="card-options d-none d-sm-block">
                    <a href="/backend/drug/create" class="btn btn-primary">Add</a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Stock</th>
                                @can ('admin|apoteker')
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drugs as $drug)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $drug->name }}</td>
                                <td>{{ $drug->drugType->name }}</td>
                                <td>Rp. {{ number_format($drug->price) }}</td>
                                <td>{{ $drug->stok }}</td>
                                @can ('admin|apoteker')
                                <td>
                                    <a href="/backend/drug/{{ $drug->id }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="/backend/drug/delete/{{ $drug->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop