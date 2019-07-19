<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mustahik extends Model
{
     use SoftDeletes;
     protected $table = 'mustahik';

     public function tipemustahiks(){
    	return $this->belongsTo('App\Tipemustahik','tipe_id','id');
    }

      public function pembagian(){
    	return $this->hasMany('App\Pembagian','mustahik_id','id');
    }
}