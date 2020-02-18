<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
   	public function Machine(){
   		return $this->belongsTo('App\Machine');
   	}
}
