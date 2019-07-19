<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembagian extends Model
{
      use SoftDeletes;
     protected $table = 'pembagian_zakat';


     public function mustahik(){
    	return $this->belongsTo('App\Mustahik');
    }

     public function getCreatedAtAttribute()
	{
	    return \Carbon\Carbon::parse($this->attributes['created_at'])
	       ->format('d - F - Y');
	}


}
