@extends('backend.template')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center pt-5">
                <img src="{{ user()->picture() }}" alt="Profile-img" class="w-50 mb-5 img-rounded brround">
                <table class="table table-striped text-left mt-5">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>:</th>
                            <td>{{ user()->username }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td>{{ user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <th>:</th>
                            <td>{{ user()->level() }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-1"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Password</h3>
            </div>
            <div class="card-body">
                <form action="/user/account/password/update" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" class="form-control" name="old_password" placeholder="Enter old password">
                        @error('old_password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Re Password</label>
                        <input type="password" class="form-control" name="re_password" placeholder="Enter re password">
                        @error('re_password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop