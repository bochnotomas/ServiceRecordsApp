<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Service records</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url("css/service_inputs.css") }}">
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

	<div class="row">
        <div class="col-4">
            <a href="{{route('view_admin_dashboard',['id'=>$room->id])}}">
                <button class="btn btn-block btn-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </button>
            </a>
        </div>
		<div class="col-8">
			<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#actionAddModal">
					<i class="fas fa-plus-circle"></i>
			</button>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table">
	  		<thead>
	    		<tr>
	      			<th>Date</th>
	      			<th>Name</th>
	      			<th class="text-center">Delete</th>
	    		</tr>
	  		</thead>
	  		<tbody>
	  			@foreach ($room->actions as $action)
	  				<tr>
	  					<td>{{$action->created_at}}</td>
	  					<td>{{$action->title}}</td>
	  					<td class="text-center">
                            <a href="" data-toggle="modal" data-target="#areUSureModal-{{$action->id}}"><i class="far fa-times-circle deletecross"></i></a>
	  					</td>
                    </tr>
                    <!--'Are u sure?' Modal  add-->
                    <div class="modal fade" id="areUSureModal-{{$action->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">
                                        Are you sure?
                                    </h3>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure, you want to delete record:  {{$action->title}}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">
                                    <a  href="{{route('deleteAction',['id'=>$action->id])}}" class="text-white">Yes</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
	  			@endforeach
	  		</tbody>
		</table>
    </div>

    <!-- Action add Modal-->
    <div class="modal fade" id="actionAddModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Please fill in to add a record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  method="POST" action="{{route('storeAction',['id'=>$room->id])}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Service record" required>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="far fa-check-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	$("input.adminCheck").change(function(){
		$(this).closest("form").submit();
	});
</script>
</body>
</html>
