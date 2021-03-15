@extends('frontend.template')

@section('content')
<!-- Profile -->
<div class="edit-profile">
	<div class="container py-4 py-md-5 py-lg-5">
		<div class="row justify-content-center">
			<div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form action="/user/password/update" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label for="old_password" class="col-lg-3 col-form-label">Password Lama</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" id="old_password">
                                    @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-lg-3 col-form-label">Password Baru</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="re_password" class="col-lg-3 col-form-label">Ulangi Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control{{ $errors->has('re_password') ? ' is-invalid' : '' }}" name="re_password" id="re_password">
                                    @error('re_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <a href="/user/profile/edit" class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                
			</div>
		</div>
	</div>
</div>
@stop