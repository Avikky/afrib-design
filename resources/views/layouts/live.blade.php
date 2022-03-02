
<!DOCTYPE html>
<html lang="en">
 
<head>
	<title>@yield('title') - Afrib Design</title>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap based News, Magazine and Blog Theme">

	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest') }}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&amp;family=Rubik:wght@400;500;700&amp;display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('live-assets/vendor/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('live-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('live-assets/vendor/tiny-slider/tiny-slider.css') }}">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('live-assets/css/bootstrap.min.css') }}">
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('live-assets/css/bootstrap-utilities.min.css') }}">
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('live-assets/css/bootstrap-grid.min.css') }}">

</head>

<body>

    <!-- =======================
Header START -->
<header>
	<nav class="navbar navbar-expand-lg navbar-light" style="background: #fff;">
		<div class="container">
			<a class="navbar-brand pr-5" href="{{url('/')}}"><h3>Afrib Design</h3></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Packages</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Contact Us</a>
			  </li>
			</ul>
			<div class="d-flex">
				<a class="btn btn-primary" href="/register">Join Us</a>
			</div>
		  </div>
		  
		  	
		</div>
	  </nav>
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    @yield('content')

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="pb-0">
	<div class="container">
		<div class="mt-4">©2021 Afrib Design. All rights reserved
		</div>
	</div>
</footer>
<!-- =======================
Footer END -->


    <!-- =======================
    JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('live-assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Vendors -->
    <script src="{{ asset('live-assets/vendor/tiny-slider/tiny-slider.js') }}"></script>

	<!-- Template Functions -->
	<script src="{{ asset('live-assets/js/functions.js') }}"></script>

 
</body>

</html>
