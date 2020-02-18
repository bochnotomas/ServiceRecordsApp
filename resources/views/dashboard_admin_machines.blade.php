<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Master</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/dashboar_admin.css") }}">
	<link href="{{ url("css/fontawesome_icons/css/all.css") }}" rel="stylesheet">
</head>
<body>

	@if(session()->has('messageDelete'))
			<div class="alert alert-danger">
				{{ session('messageDelete') }}
			</div>
	@endif
	@if(session()->has('messageUpdate'))
			<div class="alert alert-success">
				{{ session('messageUpdate') }}
			</div>
	@endif

	<nav class="navbar navbar-expand-md navbar-light sticky-top bg-light ">

		<a class="navbar-brand"><img class="img-logo" src="{{url("logo.png")}}"></a>

		<button class="navbar-toggler float-right" data-toggle="collapse" data-target="#dropintf">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="dropintf">
			<ul class="navbar-nav">
                <li class="nav-item">
                <a href="{{route('view_admin_cards_dashboard')}}" class="nav-link">Back</a>
                </li>
				<li class="nav-item">
					<a data-toggle="modal" data-target="#machineAddModal" class="nav-link">
						Add machine
					</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('viewActions',['id'=>$room->id])}}" class="nav-link">Action management</a>
                </li>
				<li class="nav-item dropdown">
					<a href="" class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" data-target="logopt">
						 <i class="fas fa-user-tie "></i>{{Auth::user()->username}}
					</a>
					<div class="dropdown-menu" aria-labelledby="logopt">
						<a href="{{route('logout')}}" class="dropdown-item">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
			<h1 class="text-center text-primary">
				Machines for: {{$room->title}}
			</h1>
			<div class="table-responsive">
				<table class="table table-hover">
			  		<thead>
			    		<tr>
			      			<th>Production facility number</th>
			      			<th>Year</th>
			      			<th>Description</th>
			      			<th>Inventory number</th>
			      			<th>Put into operation</th>
			      			<th class="text-center">Edits</th>
			    		</tr>
			  		</thead>
			  		<tbody>
			  			@foreach ($room->machines as $machine)
			  				<tr>
			  					<td>{{$machine->machine_product_number}}</td>
			  					<td>{{$machine->year}}</td>
			  					<td>{{$machine->machine_name}}</td>
			  					<td>{{$machine->inv_number}}</td>
			  					<td>{{$machine->operation_created_at}}</td>
			  					<td class="interfaces text-center" style="padding-left: 0px; padding-right: 0px;">
			  						<a href="{{route('view_serviceInputsAdmin',['id'=>$machine->id,'roomid'=>$room->id])}}"><i class="fas fa-plus-circle"></i></a>
                                    <a href="{{route('view_machineEdit',['id'=>$machine->id])}}"><i class="far fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#areUSureModal-{{$machine->id}}"><i class="far fa-times-circle"></i></a>
			  					</td>
                            </tr>
                            <!--'Are u sure?' Modal  add-->
                            <div class="modal fade" id="areUSureModal-{{$machine->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">
                                                Are you sure?
                                            </h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure, you want to delete: {{$machine->machine_name}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">
                                                <a href="{{route('deleteMachine',['id'=>$machine->id])}}" class="text-white">Yes</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
			  			@endforeach
			  		</tbody>
				</table>
			</div>
	</div>


	<!-- Machine add Modal-->
	<div class="modal fade" id="machineAddModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Please fill in to add machine</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<form  method="POST" action="{{route('storeMachine',['id'=>$room->id])}}">
			        	{{csrf_field()}}
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="machine_product_number" placeholder="Production facility number" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="year" id="date" name="year" placeholder="Year" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="machine_name" placeholder="Description" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="inv_number" placeholder="Inventory number" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="date" name="operation_created_at" placeholder="Put into operation" required>
			        	</div>
						<button type="submit" class="btn btn-primary float-right"><i class="far fa-check-circle"></i></button>
			        </form>
				</div>
			</div>
		</div>
    </div>




</body>
</html>
