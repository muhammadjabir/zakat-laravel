<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Muzaki extends Model
{
     use SoftDeletes;
     protected $table = 'muzaki';

     public function pembayaran(){
    	return $this->hasMany('App\Pembayaran','muzaki_id','id');
    }
}
