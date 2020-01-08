<!DOCTYPE html>
<html>
<head>
	<title>Laravel Ecommerce Project</title>
	@include('frontend.partials.styles')
</head>
<body>
	<div class="wrapper">
		<!-- Start Navigation Part -->
		@include('frontend.partials.nav')
		<!-- End Navbar Part -->
		@yield('content')

		@include('frontend.partials.footer')
	</div>

	@include('frontend.partials.scripts')
</body>
</html>