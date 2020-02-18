<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Input;
use App\Exports\InputsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
class InputController extends Controller
{
    public function storeInput(Request $request, $id){
        $newinput= new Input();
		$newinput->machine_id=$id;
        $newinput->description=$request->description;
       	$newinput->user=Auth::user()->username;
       	$newinput->admin_check="0";
       	$newinput->admin="Has not been checked yet";
       	$newinput->save();
       	return redirect()->back()->with('messageAdd','Service record added');
    }
    public function deleteInput($id){
        $input= Input::findOrFail($id);
        $input->delete();
        return redirect()->back()->with('messageDelete','Service record deleted');
    }

    public function updateInput($id){
      $admin_name = Auth::user()->username;

      $input = Input::findOrFail($id);
      $input->admin_check = !$input->admin_check;
      $input->admin=$admin_name;
      $input->update();

      return redirect()->back();
    }

    public function export($id){
        return Excel::download(new InputsExport($id), 'inputs.xlsx');
    }
}
