<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/userManagment.css") }}">
	<link href="{{ url("css/fontawesome_icons/css/all.css") }}" rel="stylesheet">

</head>
<body>

	@if(session()->has('addMessage'))
			<div class="alert alert-success">
				{{ session('addMessage') }}
			</div>
	@endif
	@if(session()->has('selfDelAlert'))
			<div class="alert alert-danger">
				{{ session('selfDelAlert') }}
			</div>
	@endif
	@if(session()->has('delAlert'))
			<div class="alert alert-danger">
				{{ session('delAlert') }}
			</div>
	@endif
	@if(session()->has('updateMessage'))
			<div class="alert alert-success">
				{{ session('updateMessage') }}
			</div>
	@endif

	<div class="container">
		<ul class="list-group">
			<li class="list-group-item active">
				<a href="{{route('view_admin_cards_dashboard')}}">
					<button class="btn btn-primary float-right btn-lg mybutton">
					<i class="fas fa-arrow-circle-left"></i>
					</button>
				</a>
				<h1 class="float-left">Employees</h1>

				<button class="btn btn-primary btn-lg float-right mybutton" data-toggle="modal" data-target="#userAddModal">
					<i class="fas fa-plus-circle"></i>
				</button>
			</li>
			@foreach($users as $user)
				<li class="list-group-item">
					{{$user->username}}
					<div class="interfaces float-right">
						@if($user->is_admin=="1")
							<i class="fas fa-user-tie "></i>
						@endif
                        <a href="{{ route('view_UserManagment_edit',['id'=>$user->id]) }}"><i class="far fa-edit"></i></a>
                        <a href="" data-toggle="modal" data-target="#areUSureModal-{{$user->id}}"><i class="far fa-times-circle"></i></a>


					</div>
				</li>
			@endforeach
		</ul>
	</div>


	<!-- Modal  add-->
	<div class="modal fade" id="userAddModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Please fill in to add an employee...</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<form class="form" method="POST" action="{{route('storeUser')}}">
			        	{{csrf_field()}}
			        	<div class="form-group">
			        		<input class="form-control" type="text" name="username" placeholder="Name of an employee" required>
			        	</div>
			        	<div class="form-group">
			        		<input class="form-control" type="password" name="password" placeholder="Password" required>
			        	</div>
			        	<div class="form-group">
			        		<input type="checkbox" name="is_admin" value="checked">
			        		<span>Master</span>
			        	</div>
						<button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i></button>
			        </form>
				</div>
			</div>
		</div>
    </div>
    <!--'Are u sure?' Modal  add-->
    <div class="modal fade" id="areUSureModal-{{$user->id}}">
		<div class="modal-dialog">
			<div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Are you sure?
                    </h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete: <strong>{{$user->username}}</strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                            <a  href="{{ route('deleteUser', ['id'=>$user->id]) }}" class="text-white">Yes</a>
                    </button>
                </div>
			</div>
		</div>
    </div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
