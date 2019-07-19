<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MustahikController extends Controller
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
    public function index()
    {
        //$data=\App\Mustahik::join('tipemustahiks','tipemustahiks.id','=','mustahik.tipe_id')->select('mustahik.*','tipemustahiks.tipe_mustahik')->get();

         $data=\App\Mustahik::all();
         for($i=0; $i < count($data);$i++){
            $data[$i]->tipemustahiks=\App\Tipemustahik::withTrashed()->where('id',$data[$i]->tipe_id)->first();
         }
    
         return view('mustahik.index',['data'=>$data]);

        // $data=\App\Mustahik::onlyTrashed()->findOrFail(1);
        // $data->tipemustahiks()->restore();
        // $data->restore();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $tipe=\App\Tipemustahik::all();
        return view('mustahik.create',['tipe'=>$tipe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

       public function massage(){
        $massage= ["nama.required"=>"Nama Tidak Boleh Kosong",
            "nama.min"=>"Tidak Boleh kurang dari 5",
            "nama.max"=>"Tidak Boleh Lebih dari 40",
            "nama.regex"=>"Nama Tidak Valid",

            "alamat.required"=>"Alamat tidak boleh kosong",
            "alamat.max"=>"Alamat Tidak boleh lebih dari 100",
            "nohp.required"=>"No HP Harus Diisi",
            "nohp.digits_between"=>"No Hp Tidak Benar",
            "foto.image"=>"Format Harus Gambar",
            "foto.required"=>"Foto Harus Diisi",
            "foto.max"=>"File tidak boleh lebih dari 3MB",
            "role.required"=>"Role Harus Dipilih",
            "kelamin.required"=>"Pilih Kelamin",
            "tipe.required"=>"Harus Memilih Tipe"

            ];

        return $massage;

    }
    public function store(Request $request)
    {
         $validation=\Validator::make($request->all(),[
            "nama"=>"required|regex:/(^[A-Za-z ]+$)+/|min:5|max:40",
            "alamat"=>"required|max:100",
            "nohp"=>"required|digits_between:0,13",
            "kelamin"=>"required",
            "foto"=>"required|image|max:3124",
            "tipe"=>"required"  
            ],$this->massage()

           )->validate();
        $mustahik=new \App\Mustahik;
        $mustahik->nama_mustahik=$request->get('nama');
        $mustahik->alamat=$request->get('alamat');
        $mustahik->no_hp=$request->get('nohp');
        $mustahik->tipe_id=$request->get('tipe');
        $mustahik->kelamin=$request->get('kelamin');
        if($request->file('foto')){
            $file=$request->file('foto')->store('foto_mustahik','public');
            $mustahik->foto=$file;
        }
        $mustahik->save();
        return redirect()->route('mustahik.create')->with('status','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $mustahik=\App\Mustahik::with('pembagian')->where('id','=',"$id")->first();
         $mustahik->tipemustahiks=\App\Tipemustahik::withTrashed()->where('id',$mustahik->tipe_id)->first();
         return view('mustahik.detail',['mustahik'=>$mustahik]);
        //return $mustahik;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mustahik=\App\Mustahik::findOrFail($id);
        $mustahik->tipemustahiks=\App\Tipemustahik::withTrashed()->where('id',$mustahik->tipe_id)->first();
        $tipe=\App\Tipemustahik::all();
        return view('mustahik.edit',['mustahik'=>$mustahik,
                                      'tipe'=>$tipe  
                                    ]);
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
            "nama"=>"required|regex:/(^[A-Za-z ]+$)+/|min:5|max:40",
            "alamat"=>"required|max:100",
            "nohp"=>"required|digits_between:0,13",
            "kelamin"=>"required",
            "foto"=>"image|max:3124",
            "tipe"=>"required"  
            ],$this->massage()

           )->validate();
        $mustahik=\App\Mustahik::findOrFail($id);
        $mustahik->nama_mustahik=$request->get('nama');
        $mustahik->alamat=$request->get('alamat');
        $mustahik->no_hp=$request->get('nohp');
        $mustahik->tipe_id=$request->get('tipe');
        $mustahik->kelamin=$request->get('kelamin');
        if($request->file('foto')){
            if($mustahik->foto and file_exists(storage_path('app/public/'.$mustahik->foto))){
                \Storage::delete('public/'.$mustahik->foto);
            }
            $file=$request->file('foto')->store('foto_mustahik','public');
            $mustahik->foto=$file;
        }
        $mustahik->save();
        return redirect()->route('mustahik.edit',['id'=>$mustahik->id])->with('status','Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=\App\Mustahik::findOrFail($id);
        $data->pembagian()->delete();
        $data->delete();
        return redirect()->route('mustahik.index')->with('status','Data Berhasil Dipindah ke Trash');
    }
}
