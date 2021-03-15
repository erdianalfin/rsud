@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="/patient/register/insurances/{{ $patient->id }}" method="post">
                        @csrf
                        <nav class="navbar navbar-light bg-light mb-4">
                            <span class="navbar-brand mb-0 font-weight-bold h1">Guarantee</span>
                        </nav>
                        <div class="form-group">
                            <label for="guarantee">Guarantee</label>
                            <select name="guarantee" class="form-control" id="guarantee">
                                <option value="" hidden>Choose Guarantee</option>
                                @foreach ($guarantees as $guarantee)
                                <option value="{{ $guarantee->id }}">{{ $guarantee->name }}</option>
                                @endforeach
                            </select>
                            @error('guarantee')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" name="card_number" class="form-control">
                            @error('card_number')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <button class="btn btn-primary float-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop