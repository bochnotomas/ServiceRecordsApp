<?php

namespace App\Exports;

use App\Input;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class InputsExport implements FromView
{
    protected $id;
    public function __construct($id){
        $this->id = $id;
    }

    public function view() : View
    {

        return view('dashboard_serviceInputsExcel',[
            'inputs' => Input::where('machine_id', $this->id)->get()
        ]);
    }
}
