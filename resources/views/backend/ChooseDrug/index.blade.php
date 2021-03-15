@extends('backend.template')

@section('content')
<form action="/backend/choose/drug/store/{{ $health->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Drugs</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="drug">Drug</label>
                                <select name="drug" id="drug" class="form-control">
                                    <option value="" hidden>Choose drug</option>
                                    @foreach ($drugs as $drug)
                                    <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                                    @endforeach
                                </select>
                                @error('drug')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="qty_drink_rules">Qty drink rules</label>
                                <input type="text" name="qty_drink_rules" id="qty_drink_rules" value="{{ old('qty_drink_rules') }}" class="form-control">
                                @error('qty_drink_rules')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="qty_dosage_rules">Qty dosage rules</label>
                                <input type="text" name="qty_dosage_rules" id="qty_dosage_rules" value="1" class="form-control">
                                @error('qty_dosage_rules')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <select name="message" id="message" class="form-control">
                                    <option value="" hidden>Choose message</option>
                                    <option value="Sebelum makan">Sebelum makan</option>
                                    <option value="Sesudah makan">Sesudah makan</option>
                                </select>
                                @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    @if (!$chooses->isEmpty())
                    @if ($health->medical_measures != 'berat')
                    <a href="/backend/outpatient/read/{{ $health->id }}" class="btn btn-success float-right ml-2">Finish</a>
                    @endif
                    @endif
                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Choose drug</h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example" class="table table-striped text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chooses as $choose)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <th>{{ $choose->drug->name }}</th>
                                    @if ($choose->drug->drugType->name != 'Sirup')
                                    <th>{{ $choose->qty_drink_rules }} X Sehari {{ $choose->qty_dosage_rules }} {{ $choose->drug->drugType->name }} {{ $choose->message }}</th>
                                    @else
                                    <th>{{ $choose->qty_drink_rules }} X Sehari {{ $choose->qty_dosage_rules }} Sendok makan {{ $choose->message }}</th>
                                    @endif
                                    <th>
                                        <a href="/backend/choose/drug/delete/{{ $choose->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @error('schedule')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</form>
@stop