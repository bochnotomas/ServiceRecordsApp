<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Machine;

class UserController extends Controller
{
    public function storeUser(Request $request){
    	$newuser= new User();

    	$newuser->username=$request->username;
    	$newuser->password=bcrypt($request->password);
    	if ($request->is_admin=="checked") {
    		$newuser->is_admin=1;
    	}else {
    		$newuser->is_admin=0;
    	}
    	$newuser->save();

    	return redirect()->intended(route('view_userManagment_dashboard'))->with('addMessage','Worked added');

    }

    public function deleteUser($id){
        $user= User::findOrFail($id);

        if ($id == Auth::user()->id) {
            return redirect()->back()->with('selfDelAlert','You can not delete yourself');
        }else{
            $user->delete();
            return redirect()->intended(route('view_userManagment_dashboard'))->with('delAlert','Worker deleted');
        }
    }

    public function updateUser($id, Request $request){

        $up_user=User::findOrFail($id);
        $up_user->username=$request->username;
        if ($request->is_admin=="on") {
            $up_user->is_admin=1;
        }else {
            $up_user->is_admin=0;
        }

        $up_user->update();

        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_userManagment_dashboard'))->with('updateMessage','Worker successfully changed');
        }else{
            return redirect()->intended(route('view_user_dashboard'))->with('updateMessage','Worker successfully changed');
        }




    }



}
