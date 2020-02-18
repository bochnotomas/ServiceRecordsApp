<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function Room(){
        return $this->belongsTo('App\Room');
    }
}
