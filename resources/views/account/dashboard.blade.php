@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')

<div class="container-fluid">
	<div class="mb-sm-4 py-4 px-3 d-flex flex-wrap align-items-center text-head">
		<h2 class="font-w600 mb-2 me-auto">Dashboard</h2>
	</div>
	<div class="container alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong class="text-center">Please ensure to keep your special login url safe, you can see ur special login link in your profile page</strong>
    </div>
	<div>
		<h3 class="text-center">
			Hi {{Auth::user()->name }} Welcome to Afrib Design Travel Stories</h3><br>
		<p class="text-center">Become a travel writer today..!</p>
	</div>
	
	
	<div class="d-flex justify-content-center align-items-center">
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<div class="me-3 text-center">
						Total Stories written by you
					</div>
					<div>
						<h2 class="text-center">{{ count(\App\Models\Story::where('user_id', Auth::id())->get()) }}</h2>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
