<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Illuminate\Support\Facades\Auth;
class RoomController extends Controller
{
    public function storeRoom(Request $request){
        $newroom=new Room();
        $newroom->title=$request->title;
        $newroom->description=$request->description;

       	$newroom->save();
        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_admin_cards_dashboard'))->with('messageUpdate','Room added');
        }else{
            return redirect()->intended(route('view_user_cards_dashboard'))->with('messageDelete','Room added');
        }
    }

    public function deleteRoom($id){
        $room= Room::findOrFail($id);
        $room->delete();
        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_admin_cards_dashboard'))->with('messageDelete','Room deleted');
        }else{
            return redirect()->intended(route('view_user_cards_dashboard'))->with('messageDelete','Room deleted');
        }
    }

    public function updateRoom($id, Request $request){

        /*$this->validate($request, [
            'username' => 'required',
        ]);*/

        $up_room=Room::findOrFail($id);
        $up_room->title=$request->title;
        $up_room->description=$request->description;
        $up_room->update();

        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_admin_cards_dashboard'))->with('messageUpdate','Room successfully changed');
        }else{
            return redirect()->intended(route('view_user_cards_dashboard'))->with('messageUpdate','Room successfully changed');
        }
    }
}
