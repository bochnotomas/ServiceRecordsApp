<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machine;
use Illuminate\Support\Facades\Auth;
class MachineController extends Controller
{
     public function storeMachine(Request $request, $id){
        $newmachine= new Machine();
        $newmachine->room_id=$id;
        $newmachine->machine_product_number=$request->machine_product_number;
        $newmachine->year=$request->year;
       	$newmachine->machine_name=$request->machine_name;
       	$newmachine->inv_number=$request->inv_number;
       	$newmachine->operation_created_at=$request->operation_created_at;

       	$newmachine->save();
        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_admin_dashboard',['id'=>$id]))->with('messageUpdate','Machine added');
        }else{
            return redirect()->intended(route('view_user_dashboard',['id'=>$id]))->with('messageDelete','Machine added');
        }
    }

     public function deleteMachine($id){
        $machine= Machine::findOrFail($id);
        $room_id = $machine->room->id;
        $machine->delete();


        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_admin_dashboard',['id'=>$room_id]))->with('messageDelete','Machine deleted');
        }else{
            return redirect()->intended(route('view_user_dashboard',['id'=>$room_id]))->with('messageDelete','Machine deleted');
        }
    }

    public function updateMachine($id, Request $request){

        /*$this->validate($request, [
            'username' => 'required',
        ]);*/

        $up_machine=Machine::findOrFail($id);
        $room_id = $up_machine->room->id;
        $up_machine->machine_product_number=$request->machine_product_number;
        $up_machine->year=$request->year;
        $up_machine->machine_name=$request->machine_name;
        $up_machine->inv_number=$request->inv_number;
        $up_machine->operation_created_at=$request->operation_created_at;

        $up_machine->update();

        if (Auth::User()->is_admin==1) {
            return redirect()->intended(route('view_admin_dashboard',['id'=>$room_id]))->with('messageUpdate','Machine successfully changed');
        }else{
            return redirect()->intended(route('view_user_dashboard',['id'=>$room_id]))->with('messageUpdate','Machine successfully changed');
        }




    }

}
