<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PembagianController extends Controller
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
    
    public function totalBeras(){
        $beras=\App\Pembayaran::where('bayar','=',3)->sum('bayar');
        $beras2=\App\Pembagian::sum('beras');

        $totalberas=$beras-$beras2;

        return $totalberas;
    }

    public function totalUang(){
        $uang=\App\Pembayaran::where('bayar','>',3)->sum('bayar');
        $uang2=\App\Pembagian::sum('uang');

        $totaluang=$uang-$uang2;

        return $totaluang;

    }

    public function index()
    {
        
    

        $pembagian=\App\Pembagian::all();
      
       
        return view('pembagian.index',['pembagian'=>$pembagian]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $totaluang=$this->totalUang();
        $totalberas=$this->totalBeras();

         $mustahik=\App\Mustahik::findOrFail($request->get('id'));
         $mustahik->tipemustahiks=\App\Tipemustahik::withTrashed()->where('id',$mustahik->tipe_id)->first();
         return view('pembagian.create',['mustahik'=>$mustahik,'totaluang'=>$totaluang,'totalberas'=>$totalberas]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $totaluang=number_format($this->totalUang(),2);

        $validation=\Validator::make($request->all(),[
            "uang"=>"required|numeric|between:0,{$this->totalUang()}",
            "beras"=>"required|numeric|between:0,{$this->totalBeras()}|max:3"
            ]


            ,["uang.required"=>"Harus Diisi minimal 0",
              "uang.between"=>"Uang yang diberikan tidak boleh lebih dari Rp.{$totaluang}",
              "beras.required"=>"Harus Diisi minimal 0",
              "beras.between"=>"Beras yang diberikan tidak boleh lebih dari {$this->totalBeras()}Kg",

            ]

           )->validate();
        $tahun=\Carbon\Carbon::now()->format('Y');
        $cek=\App\Pembagian::where('mustahik_id',$request->get('id_mustahik'))->where('created_at','LIKE',"%$tahun%")->get();
        if(count($cek)>0){
            return redirect()->route('pembagian.create',['id'=>$request->get('id_mustahik')])->with('gagal','Mustahik Sudah Pernah Diberikan Zakat Pada Tahun ini');
        }
        $pembagian= new \App\Pembagian;
        $pembagian->uang=$request->get('uang');
        $pembagian->beras=round($request->get('beras'),1,PHP_ROUND_HALF_DOWN);
        $pembagian->mustahik_id=$request->get('id_mustahik');
        $pembagian->save();

        return redirect()->route('pembagian.create',['id'=>$pembagian->mustahik_id])->with('status','Data Berhasil Ditambahkan');
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
        
        $pembagian=\App\Pembagian::findOrFail($id);
        $totaluang=$this->totalUang() + $pembagian->uang;
        $totalberas=$this->totalBeras() + $pembagian->beras;

        
     
         $pembagian->tipemustahiks=\App\Tipemustahik::withTrashed()->where('id',$pembagian->mustahik->id)->first();
         return view('pembagian.edit',['pembagian'=>$pembagian,'totaluang'=>$totaluang,'totalberas'=>$totalberas]);

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
        
        $totaluang=number_format($this->totalUang(),2);
        $pembagian= \App\Pembagian::findOrFail($id);

        $validation=\Validator::make($request->all(),[
            "uang"=>"required|numeric|between:0,$this->totalUang() + $pembagian->uang",
            "beras"=>"required|numeric|between:0,$this->totalBeras() + $pembagian->beras|max:3"
            ]


            ,["uang.required"=>"Harus Diisi minimal 0",
              "uang.between"=>"Uang yang diberikan tidak boleh lebih dari Rp.{$totaluang}",
              "beras.required"=>"Harus Diisi minimal 0",
              "beras.between"=>"Beras yang diberikan tidak boleh lebih dari {$this->totalBeras()}Kg",

            ]

           )->validate();

        
        $pembagian->uang=$request->get('uang');
        $pembagian->beras=round($request->get('beras'),1,PHP_ROUND_HALF_DOWN);//menghilangkan 1 angka di belakang koma
        $pembagian->save();
        return redirect()->route('pembagian.edit',['id'=>$pembagian->id])->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembagian=\App\Pembagian::findOrFail($id);
        $mustahik=$pembagian->mustahik_id;
        $pembagian->delete();

        return redirect()->route('mustahik.show',['id'=>$mustahik])->with('status','Data Berhasil Dihapus');

    }
}
