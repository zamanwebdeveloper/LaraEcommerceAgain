<!DOCTYPE html>
<html>
<head>
	<title>Laravel Ecommerce Project</title>
	@include('partials.styles')
</head>
<body>
	<div class="wrapper">
		<!-- Start Navigation Part -->
		@include('partials.nav')
		<!-- End Navbar Part -->
		@yield('content')

		@include('partials.footer')
	</div>

	@include('partials.scripts')
</body>
</html>