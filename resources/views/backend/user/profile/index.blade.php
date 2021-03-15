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
                <a href="/user/account/password" class="btn btn-primary mb-5 d-block" style="border-radius: 30px;"><i class="fas fa-key"></i> Change password</a>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <div class="card-body">
                <form action="/user/account/profile/update" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

                    <div class="form-group">
                        <label for="">Image Profile</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        @error('file')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ user()->username }}" placeholder="Enter username">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="{{ user()->email }}" placeholder="Enter email" readonly>
                    </div>
                    <button class="btn btn-primary float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop