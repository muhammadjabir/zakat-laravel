<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrashController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($request,$next){
            if(Gate::allows('manage-master')) return $next($request);
            abort(403,'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index(Request $request){
    	if($request->get('filter')=="muzaki"){
    	$data=\App\Muzaki::onlyTrashed()->get();
    	
        return view('trash.muzaki',['muzaki'=>$data]);
        }

        else if($request->get('filter')=="mustahik"){
        $data=\App\Mustahik::onlyTrashed()->get();
    	
        return view('trash.mustahik',['mustahik'=>$data]);
        }

        else if($request->get('filter')=="pembayaran"){
        $data=\App\Pembayaran::onlyTrashed()->get();
	    	for ($i=0; $i < count($data) ; $i++) { 
				foreach ($data as $datas) {
					$data[$i]->muzaki=\App\Muzaki::withTrashed()->where('id',$data[$i]->muzaki_id)->first();
				}
	        
	        }
	    	
	       return view('trash.pembayaran',['pembayaran'=>$data]);
    	}

        else if ($request->get('filter')=="pembagian") {
        $data=\App\Pembagian::onlyTrashed()->get();
		for ($i=0; $i < count($data) ; $i++) { 
			foreach ($data as $datas) {
				$data[$i]->mustahik=\App\Mustahik::withTrashed()->where('id',$data[$i]->mustahik_id)->first();
			}
			
		}
     
   		
        return view('trash.pembagian',['pembagian'=>$data]);
        }
    }

    public function deletePermanent($id, Request $request){
    	if($request->get('data')=="muzaki"){
    	$data=\App\muzaki::onlyTrashed()->findOrFail($id);
            if($data->foto and file_exists(storage_path('app/public/'.$data->foto))){
                    \Storage::delete('public/'.$data->foto);
                }
    	$data->pembayaran()->forceDelete();
    	$data->forceDelete();
    	return redirect()->route('trash',['filter'=>'muzaki'])->with('status','Data Berhasil Dihapus Permanent');
    	}

    	else if($request->get('data')=="mustahik"){
    	$data=\App\mustahik::onlyTrashed()->findOrFail($id);
          if($data->foto and file_exists(storage_path('app/public/'.$data->foto))){
                \Storage::delete('public/'.$data->foto);
            }
    	$data->pembagian()->forceDelete();
    	$data->forceDelete();
    	return redirect()->route('trash',['filter'=>'mustahik'])->with('status','Data Berhasil Dihapus Permanent');
    	}

    	else if($request->get('data')=="pembayaran"){
    	$data=\App\Pembayaran::onlyTrashed()->findOrFail($id);
    	$data->forceDelete();
    	return redirect()->route('trash',['filter'=>'pembayaran'])->with('status','Data Berhasil Dihapus Permanent');
    	}

    	else if($request->get('data')=="pembagian"){
    	$data=\App\Pembagian::onlyTrashed()->findOrFail($id);
    	$data->forceDelete();
    	return redirect()->route('trash',['filter'=>'pembagian'])->with('status','Data Berhasil Dihapus Permanent');
    	}
    }


    public function restore($id,Request $request){

		if($request->get('data')=="muzaki"){
    	$data=\App\Muzaki::onlyTrashed()->findOrFail($id);
    	$data->restore();
    	return redirect()->route('trash',['filter'=>'muzaki'])->with('status','Data Berhasil Direstore');
    	}

    	else if($request->get('data')=="mustahik"){
    	$data=\App\Mustahik::onlyTrashed()->findOrFail($id);
    	$data->restore();
    	return redirect()->route('trash',['filter'=>'mustahik'])->with('status','Data Berhasil Direstore');
    	}

    	else if($request->get('data')=="pembayaran"){
    	$data=\App\Pembayaran::onlyTrashed()->findOrFail($id);
    	$data->restore();
    	return redirect()->route('trash',['filter'=>'pembayaran'])->with('status','Data Berhasil Direstore');
    	}

    	else if($request->get('data')=="pembagian"){
    	$data=\App\Pembagian::onlyTrashed()->findOrFail($id);
    	$data->restore();
    	return redirect()->route('trash',['filter'=>'pembagian'])->with('status','Data Berhasil Direstore');
    	}
    }
}
