<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		  <a class="navbar-brand" href="{{ url('/') }}"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span>
		  </button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
			<li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
			<li class="nav-item {{ Request::is('menu') ? 'active' : '' }}"><a href="{{ url('/menu') }}" class="nav-link">Menu</a></li>
			<li class="nav-item {{ Request::is('services') ? 'active' : '' }}"><a href="{{ url('/services') }}" class="nav-link">Services</a></li>
			<li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
			<li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
			@if (Auth::check())
				<li class="nav-item {{ Request::is('cart') ? 'active' : '' }}"><a href="{{ url('/cart') }}" class="nav-link"><i class="fa fa-shopping-cart"></i> Cart</a></li>
				<li class="nav-item {{ Request::is('profile') ? 'active' : '' }}"><a href="{{ url('/profile') }}" class="nav-link"><i class="fa fa-user"></i> Profile</a></li>
				<li class="nav-item">
					<a href="{{ url('/logout') }}" class="nav-link">
					<i class="fa fa-sign-out"></i>  Sign out
					</a>
				</li>
			@else
				<li class="nav-item {{ Request::is('signin') ? 'active' : '' }}"><a href="{{ url('/signin') }}" class="nav-link"><i class="fa fa-sign-in"></i> Sign in</a></li>
			@endif
			</ul>
		</div>
	</div>
</nav>