@extends('layouts.live')

@section('title', 'Sign Up')

@section('content')

<!-- =======================
Inner intro START -->
<section>
	<div class="container">
		<div class="row">
            <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                <div class="bg-primary-soft rounded p-4 p-sm-5">
                    <h2>Create your free account </h2>
                    <!-- Form START -->
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close btn btn-danger-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                    <form action="{{ route('register') }}" method="POST" class="mt-4">
                        @csrf
                            <!-- name -->
                        <div class="mb-3">
                            <label class="form-label"  for="exampleInputEmail1">Full name</label>
                            <input type="text" name="name" class="@error('name') is-invalid  @enderror form-control" id="name" aria-describedby="emailHelp" placeholder="Full name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label"  for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="@error('email') is-invalid  @enderror form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                            <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                            @error('email')
                                <p class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="@error('password') is-invalid  @enderror form-control" id="exampleInputPassword1" placeholder="*********">
                            @error('password')
                                <p class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="*********">
                        </div>
                        <!-- Button -->
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Sign me up</button>
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
