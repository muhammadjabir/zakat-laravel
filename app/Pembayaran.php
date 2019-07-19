<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
     use SoftDeletes;
     protected $table = 'pembayaran_zakat';


     public function muzaki(){
    	return $this->belongsTo('App\Muzaki','muzaki_id','id');
    }
    public function getCreatedAtAttribute()
	{
	    return \Carbon\Carbon::parse($this->attributes['created_at'])
	       ->format('d - F - Y');
	}
}
