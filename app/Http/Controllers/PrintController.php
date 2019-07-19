<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Gate;

class PrintController extends Controller
{
	    public function __construct(){
	    $this->middleware('auth');

    }


    public function print(Request $request){
    	$tahun=$request->get('tahun');
		
		    	if($request->get('filter')==="pembayaran"){
		    		if($request->get('tipe')=='Fitrah'){
		    			 $pembayaran=\App\Pembayaran::where('tipe_zakat','FITRAH')->where('created_at','LIKE',"%$tahun%")->get();
		    		}
		    		else{
		    			$pembayaran=\App\Pembayaran::where('tipe_zakat','MAL')->where('created_at','LIKE',"%$tahun%")->get();
		    		}

	         		$pdf=PDF::loadView('print.pembayaran',['pembayaran'=>$pembayaran])->setPaper('a4' , 'portrait');

		    	}
		    	else if($request->get('filter')==="pembagian"){

		    		$pembayaran=\App\Pembayaran::all();
		    		$total_beras=$pembayaran->where('bayar','=',3)->sum('bayar');
		    		$total_uang=$pembayaran->where('bayar','>',3)->sum('bayar');
		    		$pembayaran=\App\Pembayaran::all();
		    		$pembagian=\App\Pembagian::where('created_at','LIKE',"%$tahun%")->get();
		    
		    		

		    		$pdf=PDF::loadView('print.pembagian',['pembagians'=>$pembagian,'total_uang'=>$total_uang,'total_beras'=>$total_beras])->setPaper('a4' , 'portrait');

		    	}

		    	else if($request->get('filter')==="laba")
		    	{
		    			
		    		$pembagian=\App\Pembagian::all();
		
		    		$pembayaran=\App\Pembayaran::all();

		    		$pdf=PDF::loadView('print.laba',[
		    			'pembagian'=>$pembagian,
		    			'pembayaran'=>$pembayaran,
		    			
		    			])->setPaper('a4' , 'portrait');

		    	}

		    	else if($request->get('filter')=="mustahik"){
		    		$mustahik=\App\Mustahik::all();
		    		for ($i=0;$i<count($mustahik);$i++) {
		    			$mustahik[$i]->tipemustahiks=\App\Tipemustahik::withTrashed()->where('id',$mustahik[$i]->tipe_id)->first();
		    		}
		    		$pdf=PDF::loadView('print.mustahik',[
		    			'mustahik'=>$mustahik
		    			
		    			])->setPaper('a4' , 'portrait');
		    		

		    	}

		    		else if($request->get('filter')=="muzaki"){
		    		$muzaki=\App\Muzaki::all();
		    		
		    		$pdf=PDF::loadView('print.muzaki',[
		    			'muzaki'=>$muzaki
		    			
		    			])->setPaper('a4' , 'portrait');
		    		

		    	}
     	$filename="Laporan_".$request->get('filter').".pdf";
    
		 return $pdf->stream($filename);
    
    }	 
    
}
