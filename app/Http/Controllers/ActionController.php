<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function storeAction(Request $request, $id){
        $newaction= new Action();
        $newaction->room_id=$id;
        $newaction->title=$request->title;

       	$newaction->save();
        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('viewActions',['id'=>$id]))->with('messageUpdate','Action added');
        }else{
            return redirect()->intended(route('viewActions',['id'=>$id]))->with('messageUpdate','Action added');
        }
    }
    public function deleteAction($id){
        $action= Action::findOrFail($id);
        $action->delete();
        return redirect()->back()->with('messageDelete','Action deleted');
    }
}
