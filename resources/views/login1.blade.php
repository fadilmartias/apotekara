<!doctype html>
<html lang="en">
  <head>
  	<title>Login 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
	<body class="bg-white">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<p class="text-center">Sign in by entering the information below</p>
						<form action="#" class="login-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3 mt-3">Login</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>

