<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Machine edit</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/machineEdit.css") }}">
	<link href="{{ url("css/fontawesome_icons/css/all.css") }}" rel="stylesheet">
</head>
<body>
	<div class="container col-md-4">
		<h1>Machine: {{ $machine->machine_name }}</h1>
		<form  method="POST" action="{{route('updateMachine',['id'=>$machine->id])}}">
			        	{{csrf_field()}}
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="machine_product_number" value="{{ $machine->machine_product_number }}" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="year" value="{{ $machine->year }}" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="machine_name" value="{{ $machine->machine_name }}" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="inv_number" value="{{ $machine->inv_number}}" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="date" name="operation_created_at" value="{{ $machine->operation_created_at}}" required>
			        	</div>
						<button type="submit" class="btn btn-large btn-primary"><i class="far fa-check-circle"></i></button>
		</form>
	</div>


</body>
</html>
