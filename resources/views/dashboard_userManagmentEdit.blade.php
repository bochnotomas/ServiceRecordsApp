<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Worker edit</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container col-md-5">
		<h1 class="text-center">Worker edit</h1>
		<form method="POST" action="{{route('updateUser',['id'=>$user->id])}}">
			{{csrf_field()}}
			<div class="form-group">
				<input class="form-control" type="text" name="username" value="{{ $user->username }}" required>
			</div>
			<div class="form-group">
				Master
			<input type="checkbox" name="is_admin" {{$user->is_admin ? 'checked' : ''}}>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>
