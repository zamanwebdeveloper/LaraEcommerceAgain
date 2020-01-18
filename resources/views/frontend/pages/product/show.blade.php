@extends('frontend.layouts.master')
@section('content')
<!-- Start Sidebar + Content -->
		<div class="container margin-top-20">
			<div class="row">
				<div class="col-md-4">
					<div class="list-group">
					 @include('frontend.partials.product-sidebar')
					</div>
				</div>
				<div class="col-md-8">
					<div class="widget">
						<h3>{{$product->title}}</h3>
					</div>
					<div class="widget">
						
					</div>
				</div>
			</div>
		</div>
<!-- End Sidebar + Content -->
@endsection