<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipemustahikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($request,$next){
            if(Gate::allows('manage-master')) return $next($request);
            abort(403,'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index()
    {
       //$tipe = \App\Tipemustahik::withTrashed()->get();
      $tipe = \App\Tipemustahik::all();
     return view('tipemustahik.index',['data'=>$tipe]);
        
        // $data=\App\tipemustahik::withTrashed()->findOrFail(3);
 

        
           //  $mustahiks=\App\mustahik::onlyTrashed()->where('tipe_id','=',"$data->id")->get();
           // foreach ($mustahiks as $mustahik) {
           //      $musta=\App\mustahik::onlyTrashed()->findOrFail($mustahik->id);
           //      $musta->restore();
           //  } 
              
            //$data->restore();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipemustahik.create');
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
            "tipe"=>"required|regex:/(^[A-Za-z ]+$)+/|max:20"
        
            ],["required"=>"Form ini harus diisi", "regex"=>"Tidak boleh ada angka" , "max"=>"Maksimal 20 karakter"]

           )->validate();

        $tipe= new \App\Tipemustahik;
        $tipe->tipe_mustahik=$request->get('tipe');
        $tipe->save();
        $coba=$tipe->save();
        return redirect()->route('tipemustahik.index')->with('status','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe=\App\Tipemustahik::findOrFail($id);
        return view('tipemustahik.edit',['tipe'=>$tipe]);
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
        
        $validation=\Validator::make($request->all(),[
            "tipe"=>"required|regex:/(^[A-Za-z ]+$)+/|max:20"
        
            ],["required"=>"Form ini harus diisi", "regex"=>"Tidak boleh ada angka" , "max"=>"Maksimal 20 karakter"]

           )->validate();
        $tipe=\App\Tipemustahik::findOrFail($id);
        $tipe->tipe_mustahik=$request->get('tipe');
        $tipe->save();

        return redirect()->route('tipemustahik.edit',['id'=>$tipe->id])->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $tipe=\App\Tipemustahik::findOrFail($id);
        $tipe->delete();
        return redirect()->route('tipemustahik.index')->with('status','Data Berhasil Dipindahkan Ke Trash');
    }
}
