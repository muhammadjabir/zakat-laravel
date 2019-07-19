<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($request,$next){
            if(Gate::allows('manage-admin')) return $next($request);
            abort(401,"Anda Harus Login");
        });
    }
    
    public function index(Request $request)
    {


        if ($request->get('filter')=='FITRAH') {
            $pembayaran=\App\Pembayaran::where('tipe_zakat','FITRAH')->get();
        }
        elseif($request->get('filter')=='MAL'){
            $pembayaran=\App\Pembayaran::where('tipe_zakat','MAL')->get();
        }
        else{
              $pembayaran=\App\Pembayaran::all();
        }

      

        //return $muzaki;
        return  view('pembayaran.index',['pembayaran'=>$pembayaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $muzaki=\App\Muzaki::findOrFail($request->get('id'));
        return view('pembayaran.create',['muzaki'=>$muzaki]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=\Validator::make($request->all(),[
            "bayar"=>"required|between:0,12"],["bayar.required"=>"Harus Diisi",
                                            "bayar.between"=>"harta terlalu besar"]

           )->validate();
        $pembayaran= new \App\Pembayaran;
        $pembayaran->bayar=$request->get('bayar');
        $pembayaran->tipe_zakat=$request->get('zakat');
        $pembayaran->muzaki_id=$request->get('id_muzaki');
        $pembayaran->save();
      
        return redirect()->route('pembayaran.create',['id'=>$request->get('id_muzaki'),
                                                        'zakat'=>strtolower($request->get('zakat'))])
        ->with('status','Data Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran=\App\Pembayaran::with('muzaki')->where('id','=',"$id")->first();
        return view('pembayaran.edit',['pembayaran'=>$pembayaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $pembayaran= \App\Pembayaran::findOrFail($id);
        $pembayaran->bayar=$request->get('bayar');
        $pembayaran->tipe_zakat=$request->get('zakat');
        $pembayaran->save();
        return redirect()->route('pembayaran.edit',['id'=>$pembayaran->id])->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran=\App\Pembayaran::findOrFail($id);
        $id=$pembayaran->muzaki_id;
        $pembayaran->delete();
        return redirect()->route('muzaki.show',['id'=>$id])->with('status','Data Zakat Berhasil Dihapus');
    }
}
