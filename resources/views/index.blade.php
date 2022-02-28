@extends('layouts.live')

@section('title', 'Home')

@section('content')
<!-- =======================
banner section START -->
<section class="p-0" style="background: #f4f4f4; height: 350px;">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
		  <div class="carousel-item active" style="background: #f4f4f4; height: 350px;">
			<img src="https://ychef.files.bbci.co.uk/976x549/p0b16s27.jpg" class="d-block w-100" alt="...">
		  </div>
		  <div class="carousel-item" style="background: #f4f4f4; height: 350px;">
			<img src="https://ychef.files.bbci.co.uk/976x549/p0b16s27.jpg" class="d-block w-100" alt="...">
		  </div>
		  <div class="carousel-item" style="background: #f4f4f4; height: 350px;">
			<img src="https://ychef.files.bbci.co.uk/976x549/p0b16s27.jpg" class="d-block w-100" alt="...">
		  </div>
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
			<h5>Subscribe to our news letter</h5>
		</div>
		<div class="col-md-4">
			<form action="#">
				<input  type="email" class="form-control" id="" placeholder="Enter your email">
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
		<div class="col-md-7">
			<div class="card" style="background-image: url('https://media.istockphoto.com/photos/young-man-arms-outstretched-by-the-sea-at-sunrise-enjoying-freedom-picture-id1285301614?b=1&k=20&m=1285301614&s=170667a&w=0&h=tDEC2-p91cZiNU5C19sVhB9L08PmaH5wIijCvRDalCI=');background-position: center;background-repeat: no-repeat; background-size: cover; height: 457px;">
				<div class="description">
					<p>Date</p>
					<p>main decription</p>
				</div>
			</div>
			
		</div>
		<div class="col-md-5">
			<div class="d-flex flex-column">
				<div class="card mb-3" style="height: 220px; background-image: url('https://ychef.files.bbci.co.uk/976x549/p0b16s27.jpg');background-position: center;background-repeat: no-repeat; background-size: cover;">
				
				</div>
				<div class="card mb-3" style="height: 220px; background-image: url('https://www.schengenvisainfo.com/news/wp-content/uploads/2021/12/Italy-covid-19-europe-travel.jpg');background-position: center;background-repeat: no-repeat; background-size: cover;">
	
				</div>
			</div>
			
		</div>
	</div>	
	<div class="row">
		<div class="card mb-3">
			<div class="row g-0">
			  <div class="col-md-4">
				<img src="https://waterfallshopping.com/wp-content/uploads/2021/07/WTTC-Gives-Seven-More-Countries-Safe-Travel-Stamp.jpg" class="img-fluid rounded-start" alt="...">
			  </div>
			  <div class="col-md-8">
				<div class="card-body">
				  <h5 class="card-title">Card title</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				</div>
			  </div>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-center my-5">
		<a href="" class="btn btn-outline-primary btn-lg">Load More</a>
	</div>
</section>
<!-- featured section END -->

<!-- pupolar story section START -->
<section class="container mt-4">
	<h3 class="text-center">Most Pupolar stories</h3>
		
</section>

<!-- pupolar story section END -->

@endsection