<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{



    public function logout(){
    	Auth::logout();
    	return redirect(route('view_login'));

    }

    public function login(Request $request){

    	$logindata= $request->only('username','password');

    	if (Auth::attempt($logindata)) {
    			if (Auth::user()->is_admin=="1") {
				return redirect()->intended(route('view_admin_cards_dashboard'));
			}else{
				return redirect()->intended(route('view_user_cards_dashboard'));
			}
    	}else{
    		return redirect()->intended(route('view_login'))->with('messageLogin','Login unsuccessful');
    	}
    }
}
