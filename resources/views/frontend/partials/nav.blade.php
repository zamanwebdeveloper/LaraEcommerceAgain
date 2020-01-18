<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				  <a class="navbar-brand" href="{{route('index')}}">Zaman Store</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{route('products')}}">Products</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{route('contact')}}">Contact</a>
				      </li>
				
				    </ul>
				    <form class="form-inline my-2 my-lg-0">
				      <div class="input-group mb-3">
				        <input type="text" class="form-control" placeholder="Search Products" aria-label="Search Products" aria-describedby="button-addon2">
				        <div class="input-group-append">
				          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
				        </div>
				      </div>
				    </form>
				  </div>
			</div>
		</nav>

<!-- New Nav Bar -->