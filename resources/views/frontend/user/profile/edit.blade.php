@extends('frontend.template')

@section('content')
<div class="edit-profile">
	<div class="container py-4 py-md-5 py-lg-5">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<form class="row" action="/user/profile/update" method="post" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="col-lg-4 justify-content-center">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="image-frame mx-auto">
                                    <img src="{{ user()->picture() }}" class="img-fluid image shadow preview" alt="user-picture">
                                    <div class="file-upload-circle shadow">
                                        <input type="file" name="file" id="file">
                                        <i class="fal fa-camera"></i>
                                    </div>
                                </div>
                                @error('file')
                                <span class="d-block text-danger text-center mt-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
					</div>
					<div class="col-lg-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                            <div class="form-group row">
							<label for="email" class="col-lg-3 col-form-label">Email</label>
							<div class="col-lg-9">
								<input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') ?? user()->email }}" readonly>
								@error('email')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="username" class="col-lg-3 col-form-label">Username</label>
							<div class="col-lg-9">
								<input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="username" value="{{ old('username') ?? user()->username }}">
								@error('username')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                        </div>
                        <div class="form-group row">
							<label class="col-lg-3 col-form-label">Password</label>
							<div class="col-lg-9">
								<a href="/user/password" class="d-block mt-2"> Ubah Password</a>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-3"></div>
							<div class="col-lg-9">
								<a href="/" class="btn btn-danger">Batal</a>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
                            </div>
                        </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	$("#file").change(function() {
		readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				console.log(e.target.result)
				$('.preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}
</script>
@stop