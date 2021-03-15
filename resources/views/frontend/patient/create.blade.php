@extends('frontend.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="/patient/store" method="post">
                        @csrf
                        <nav class="navbar navbar-light bg-light mb-4">
                            <span class="navbar-brand mb-0 font-weight-bold h1">Rekab medis</span>
                        </nav>
                        <div class="form-group">
                            <input type="text" name="no_rm" class="form-control">
                            @error('no_rm')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <button class="btn btn-primary float-right">Save</button>
                        <div class="d-flex justify-content-center">
                            <p>Belum punya no rekab medis ?</p>
                            <a href="/patient/register" class="text-primary text-center ml-2">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop