@extends('layouts.live')

@section('title', 'Login')

@section('content')

<section>
	<div class="container">
		<div class="row">
      <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
        <div class="p-4 p-sm-5 bg-primary-soft rounded">
					<h2 class="text-center">Admin Login</h2>
					<!-- Form START -->
					<form action="{{ route('login') }}" method="POST" class="mt-4">
                        @csrf
						<!-- Email -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputEmail1">Email address</label>
							<input type="email" name="email" class="@error('email') is-invalid  @enderror form-control" required id="exampleInputEmail1" placeholder="E-mail">
                            @error('email')
                                <p class="text-danger">{{ $message }}</div>
                            @enderror
						</div>
						<!-- Password -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputPassword1">Password</label>
							<input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="*********">
						</div>
						<!-- Button -->
						<div class="row align-items-center">
							<div class="col-sm-4">
								<button type="submit" class="btn btn-primary">Sign me in</button>
							</div>
						</div>
					</form>
        </div>
      </div>
    </div>
	</div>
</section>
<!-- =======================
Inner intro END -->

@endsection