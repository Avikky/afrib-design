@extends('layouts.live')

@section('title', 'Home')

@section('content')
<!-- =======================
banner section START -->
<section class="p-0 d-flex justify-content-center align-items-center" style="background-image: url('https://media.istockphoto.com/photos/young-man-arms-outstretched-by-the-sea-at-sunrise-enjoying-freedom-picture-id1285301614?b=1&k=20&m=1285301614&s=170667a&w=0&h=tDEC2-p91cZiNU5C19sVhB9L08PmaH5wIijCvRDalCI=');background-position: center;background-repeat: no-repeat; background-size: cover; height: 457px;">
	<div class="d-flex justify-content-center align-items-center card-body">
		<div class="card-title px-4" style="width: 50%; height: 200px; background-color: rgb(0,0,0, 0.5); color: #fff; border-radius: 10px;" >
			<h3 class="text-center mt-5">Welcome to Afrib Travel Stories</h3>
			<p class="mt-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, tempore.</p>
			<p class="d-flex justify-content-center">
				<a class="btn btn-primary btn-sm" href="{{route('register')}}">Get started</a>
			</p>
			<br>
		</div>
	</div>
</section>
<!-- =======================
banner section END -->

<!-- =======================
Search section START -->
<section class="container pt-5" style="background: #fff; height: 150px;">
	<div class="row">
		<div class="col-md-6">
			<h5>Search Stories</h5>
		</div>
		<div class="col-md-4">
			<form action="#">
				<input  type="text" class="form-control" id="" placeholder="Search">
			</form>
		</div>
		<div class="col-md-2">
			<button class="d-inline btn btn-primary" type="submit">Search</button>
		</div>
	</div>	
</section>
<hr>
<!-- Search section END -->

<!-- featured story section START -->
<section class="container mt-4 mb-4" style="background: #fff; height: 550px;">
	<div class="row">
		@if(count($stories) > 0)
			<div class="col-md-7"> 
				<div class="card" style="background-image: url('{{$stories[0]->image}}');background-position: center;background-repeat: no-repeat; background-size: cover; height: 457px;">
					<div class="d-flex justify-content-center align-items-end card-body">
						<div class="card-title px-4" style="width: 70%; height: 200px; background-color: rgb(0,0,0, 0.5); color: #fff; border-radius: 10px;" >
							<h3 class="text-center">{{$stories[0]->title}}</h3>
							<p> {!!html_entity_decode(substr(strip_tags($stories[0]->story) , 0, 100))!!}</p>
							<p class="d-flex justify-content-center">
								<a class="btn btn-primary btn-sm" href="{{route('view.story', ['slug' => $stories[0]->slug])}}">Read story</a>
							</p>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="d-flex flex-column">
					<div class="card mb-3" style="height: 220px; background-image: url('{{$stories[2]->image}}');background-position: center;background-repeat: no-repeat; background-size: cover;">
						<div class="d-flex justify-content-center align-items-end card-body">
							<div class="card-title px-4" style="width: 70%; height: 180px; background-color: rgb(0,0,0, 0.5); color: #fff; border-radius: 10px;" >
								<h3 class="text-center">{{$stories[2]->title}}</h3>
								<p>
									{!!html_entity_decode(substr(strip_tags($stories[2]->story) , 0, 50))!!}
								</p>
								<p class="d-flex justify-content-center">
									<a class="btn btn-primary btn-sm" href="{{route('view.story', ['slug' => $stories[2]->slug])}}">Read story</a>
								</p>
								<br>
							</div>
						</div>
					</div>
					<div class="card mb-3" style="height: 220px; background-image: url('{{$stories[1]->image}}');background-position: center;background-repeat: no-repeat; background-size: cover;">

						<div class="d-flex justify-content-center align-items-end card-body">
							<div class="card-title px-4" style="width: 70%; height: 190px; background-color: rgb(0,0,0, 0.5); color: #fff; border-radius: 10px;" >
								<h3 class="text-center">{{$stories[1]->title}}</h3>
								<p>
									{!!html_entity_decode(substr(strip_tags($stories[1]->story) , 0, 50))!!}
								</p>
								<p class="d-flex justify-content-center">
									<a class="btn btn-primary btn-sm" href="{{route('view.story', ['slug' => $stories[1]->slug])}}">Read story</a>
								</p>
								<br>
							</div>
						</div>
		
					</div>
				</div>
				
			</div>
		@else
			<h3 class="text-center"> No stories recorded yet</h3>
		@endif
	</div>	
	<div class="row mt-4">
		<div class="card mb-3">
			<div class="row g-0">
				@forelse ( $stories->slice(0, 4)  as $story )
					<div class="col-md-4">
						<img src="{{$story->image}}" width="200px" height="120px" alt="story image">
						</div>
						<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">{{$story->title}}</h5>
							<p class="card-text">{!!html_entity_decode(substr(strip_tags($story->story) , 0, 120))!!}</p>
							<p>
								<a class="btn btn-primary btn-sm" href="{{route('view.story', ['slug'=> $story->slug])}}">View Story</a>
							</p>
							<p class="card-text">
								<small class="text-muted">
									<strong>Author</strong> {{\App\Models\User::find($story->user_id)->name }}
								</small>
								<small class="text-muted">
									<strong>Date</strong> {{$story->created_at }}
								</small>
							</p>
						</div>
					</div>
					<hr>
				@empty
					<h4 class="text-center">No Stories yet</h4>
				@endforelse
			</div>
			
		</div>
	</div>
	<div class="d-flex justify-content-center my-5">
		<a href="{{route('all.story')}}" class="btn btn-outline-primary btn-lg">Load More</a>
	</div>
</section>
<!-- featured section END -->

<!-- pupolar story section START -->
<section class="container mt-4">
	<h3 class="text-center">Most Pupolar stories</h3>
		
</section>

<!-- pupolar story section END -->

@endsection