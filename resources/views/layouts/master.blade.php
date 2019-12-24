<!DOCTYPE html>
<html>
<head>
	<title>Laravel Ecommerce Project</title>
	@include('layouts.partials.styles')
</head>
<body>
	<div class="wrapper">
		<!-- Start Navigation Part -->
		@include('layouts.partials.nav')
		<!-- End Navbar Part -->
		@yield('content')

		@include('layouts.partials.footer')
	</div>

	@include('layouts.partials.scripts')
</body>
</html>