<?php

namespace App\Http\Controllers;
use App\User;
use App\Machine;
use App\Room;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
public function viewLogin(){
		if (Auth::check()) {
			if(Auth::user()->is_admin){
				return redirect()->route("view_admin_cards_dashboard");
			}else{
				return redirect()->route("view_user_cards_dashboard");
			}
		}
    	return view('login');
    }



public function viewAdminCards(){
    $rooms=Room::All();
    return view('dashboard_admin_cards')->with([
        'rooms'=>$rooms
    ]);
}


public function viewUserCards(){
    $rooms=Room::All();
    return view('dashboard_user_cards')->with([
        'rooms'=>$rooms
    ]);
}


public function viewUserManagment(){
	$users=User::All();
	return view('dashboard_userManagment')->with([
		'users'=>$users
	]);
}




public function viewEditUSer($id){
	$user=User::findOrFail($id);

	return view('dashboard_userManagmentEdit')->with([
		'user'=>$user
	]);

}

public function viewMachineEdit($id){
	$machine=Machine::findOrFail($id);

	return view('dashboard_machineEdit')->with([
		'machine'=>$machine
	]);
}

public function viewRoomEdit($id){
    $room=Room::findOrFail($id);
    return view('dashboard_roomEdit')->with([
        'room'=>$room
    ]);
}

public function viewServiceInputsAdmin($id, $roomid){
    $machine=Machine::findOrFail($id);
    $room=Room::findOrFail($roomid);

	return view('dashboard_serviceInputsAdmin')->with([
		'machine'=>$machine, 'room'=>$room
	]);
}


public function viewServiceInputsUser($id,$roomid){
    $machine=Machine::findOrFail($id);
    $room=Room::findOrFail($roomid);

	return view('dashboard_serviceInputsUser')->with([
		'machine'=>$machine, 'room'=>$room
    ]);
}

public function viewActions($id){
    $room=Room::findOrFail($id);

    return view('dashboard_actionManagment')->with([
        'room'=>$room
    ]);
}

public function viewAdminMachines($id){
    $room=Room::findOrFail($id);
	return view('dashboard_admin_machines')->with([
		'room'=>$room
	]);
}
public function viewUserMachines($id){
    $room=Room::findOrFail($id);
	return view('dashboard_user_machines')->with([
		'room'=>$room
	]);
}



}
