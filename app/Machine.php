<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public function inputs(){
    	return $this->hasMany('App\Input');
    }

    public function Room(){
        return $this->belongsTo('App\Room');
    }

}
