<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipemustahik extends Model
{
    use SoftDeletes;
    public function mustahiks(){
    	return $this->hasMany('App\Mustahik','tipe_id','id');
    }
}
