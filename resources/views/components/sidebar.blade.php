<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ url('/home') }}" class="brand-link">
	  
	  <span class="brand-text text-white text-center" style="font-size: 14px;font-weight: bolder; text-transform: uppercase;">
		Afrib Design
	  </span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
		  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
		  <span class="p-1 text-white">
			{{ Auth::user()->name}}
		  </span>
		  <span class="dot text-green"></span>
		</div>
	  </div>

	  <!-- Sidebar Menu -->
	  <nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <li class="nav-item">
			<a href="{{ route('dashboard') }}" class="nav-link">
			  <i class="nav-icon fa fa-th text-white"></i>
			  <p>
				Dashboard
			  </p>
			</a>
		  </li>
		  <li class="nav-item has-treeview">
			  <a href="#" class="nav-link">
				<i class="nav-icon fa fa-edit text-yellow"></i>
				@if (Auth::user()->role == 1)
					<p>
						All Stories
						<i class="right fa fa-angle-left"></i>
				  	</p>
				@else
					<p>
						My Stories
						<i class="right fa fa-angle-left"></i>
				  	</p>
				@endif
				
			  </a>
			  <ul class="nav nav-treeview">
				@if(Auth::user()->role == 1)
					
					<li class="nav-item">
						<a href="{{ route('admin.stories') }}" class="nav-link ml-3">
						<i class="far fa-circle nav-icon"></i>
						<p>All Stories</p>
						</a>
				   </li>
					<li class="nav-item">
						<a href="{{ url('/admin/category') }}" class="nav-link ml-3">
							<i class="far fa-circle nav-icon"></i>
							<p>Story Categories</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('/admin/location') }}" class="nav-link ml-3">
							<i class="far fa-circle nav-icon"></i>
							<p>Story Location</p>
						</a>
					</li>
				@else
				<li class="nav-item">
					<a href="{{ route('stories') }}" class="nav-link ml-3">
					  <i class="far fa-circle nav-icon"></i>
					  <p>New Story</p> 
					</a>
				  </li>
  
				  <li class="nav-item">
					<a href="{{ route('stories') }}" class="nav-link ml-3">
					  <i class="far fa-circle nav-icon"></i>
					  <p>All Stories</p>
					</a>
				  </li>
				@endif

			  </ul>
		  </li>

		  
		  <li class="nav-item">
			<a href="{{ route('profile') }}" class="nav-link">
			  <i class="nav-icon fa fa-product-hunt text-yellow"></i>
			  <p>Profile</p>
			</a>
		  </li>

		  <li class="nav-item">
			<a href="{{ route('setting') }}" class="nav-link">
			  <i class="nav-icon fa fa-cogs text-pink"></i>
			  <p>Setting</p>
			</a>
		  </li>
		  
		  <li class="nav-item">
			<a class="nav-link" href="{{ route('logout') }}"
			  onclick="event.preventDefault();
			  document.getElementById('logout-form').submit();">
			  <i class="nav-icon fa fa-power-off text-red"></i>
			  <p>{{ __('Logout') }}</p>
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		  </li>
		</ul>
	  </nav>
	  <!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
  </aside>