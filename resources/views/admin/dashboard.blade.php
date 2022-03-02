@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')

<div class="container-fluid">
	<div class="mb-sm-4 py-4 px-3 d-flex flex-wrap align-items-center text-head">
		<h2 class="font-w600 mb-2 me-auto">Dashboard</h2>
	</div>
	<div>
		<h3 class="text-center">
			Hi {{Auth::user()->name }} Welcome to Afrib Design Travel Stories</h3><br>
		<p class="text-center">Become a travel writer today..!</p>
	</div>	
	<div class="d-flex justify-content-center align-items-center">
		<div class="row">
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<div class="me-3 text-center">
							Total Stories
						</div>
						<div>
							<h2 class="text-center">{{ count(\App\Models\Story::get()) }}</h2>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<div class="me-3 text-center">
							Total Users
						</div>
						<div>
							<h2 class="text-center">{{ count(\App\Models\User::where('role', 0)->get()) }}</h2>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<div class="me-3 text-center">
							Total Published story
						</div>
						<div>
							<h2 class="text-center">{{ count(\App\Models\Story::where('status', 1)->get()) }}</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<div class="me-3 text-center">
							Total Rejected story
						</div>
						<div>
							<h2 class="text-center">{{ count(\App\Models\Story::where('status', 2)->get()) }}</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<div class="me-3 text-center">
							Total Unreviwed story
						</div>
						<div>
							<h2 class="text-center">{{ count(\App\Models\Story::where('status', 0)->get()) }}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

@endsection
