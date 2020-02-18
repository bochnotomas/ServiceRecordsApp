<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/login.css") }}">
	<title>ke-elektrik</title>
</head>
<body>
		@if(session()->has('messageLogin'))
			<div class="alert alert-danger">
				{{ session('messageLogin') }}
			</div>
		@endif
	<div class="container-fluid col-md-4">
		<div class="text-center">
			<img src="{{ url("logo.png") }}" alt="electronica_logo">
		</div>

			<form action="{{route('login')}}" method="POST"> {{csrf_field()}}
				<div class="form-group">
					<label for="username">Name</label>
					<input type="text" name="username" class="form-control" placeholder="Input name" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Input password" required>
					<small>If forgotten, turn on your employer</small>
				</div>

				<button type="submit" class="btn btn-outline-primary btn-sm">Sign in</button>

			</form>
	</div>

</body>
</html>
