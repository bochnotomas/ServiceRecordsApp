<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Master</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/admin_rooms.css") }}">
	<link href="{{url("css/fontawesome_icons/css/all.css")}}" rel="stylesheet">
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
            <h1 class="text-center text-primary">Rooms</h1>

			<div class="card-columns">
            @foreach ($rooms as $room)
                <div class="card text-primary border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h3>{{$room->title}}</h3>
                    </div>
                    <div class="card-bodytext-primary">
                        <p class="card-text">
                            {{$room->description}}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <div class="card-text interfaces">
                            <a href="{{route('view_user_dashboard',['id'=>$room->id])}}"><i class="fas fa-door-open"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
	</div>


</body>
</html>
