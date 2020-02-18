<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Room edit</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/machineEdit.css") }}">
	<link href="{{ url("css/fontawesome_icons/css/all.css") }}" rel="stylesheet">
</head>
<body>
	<div class="container col-md-4">
		<h1>Room: {{ $room->title }}</h1>
		<form  method="POST" action="{{route('updateRoom',['id'=>$room->id])}}">
			        	{{csrf_field()}}
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="title" value="{{ $room->title }}" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="description" value="{{ $room->description }}" required>
			        	</div>
						<button type="submit" class="btn btn-large btn-primary"><i class="far fa-check-circle"></i></button>
		</form>
	</div>


</body>
</html>
