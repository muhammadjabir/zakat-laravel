<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class MuzakiController extends Controller
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
    public function massage(){
        $massage= ["nama.required"=>"Nama Tidak Boleh Kosong",
            "nama.min"=>"Tidak Boleh kurang dari 5",
            "nama.max"=>"Tidak Boleh Lebih dari 40",
            "nama.regex"=>"Nama Tidak Valid",

            "alamat.required"=>"Alamat tidak boleh kosong",
            "alamat.max"=>"Alamat Tidak boleh lebih dari 100",
            "nohp.required"=>"No HP Harus Diisi",
            "nohp.digits_between"=>"No HP Kepanjangan",
            "foto.image"=>"Format Harus Gambar",
            "foto.required"=>"Foto Harus Diisi",
            "foto.max"=>"File tidak boleh lebih dari 3MB",
            "role.required"=>"Role Harus Dipilih",
            "kelamin.required"=>"Pilih Kelamin"

            ];

        return $massage;

    }
    public function index()
    {
       $muzaki=\App\Muzaki::all();
       return view('muzaki.index',['muzaki'=>$muzaki]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('muzaki.create');
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
            "nama"=>"required|regex:/(^[A-Za-z ]+$)+/|min:5|max:40",
            "alamat"=>"required|max:100",
            "nohp"=>"required|digits_between:0,13",
            "kelamin"=>"required",
            "foto"=>"required|image|max:3124"  
            ],$this->massage()

           )->validate();

        $muzaki=new \App\Muzaki;
        $muzaki->nama_muzaki=$request->get('nama');
        $muzaki->alamat=$request->get('alamat');
        $muzaki->no_hp=$request->get('nohp');
        $muzaki->kelamin=$request->get('kelamin');
        if($request->file('foto')){
            $file=$request->file('foto')->store('foto_muzaki','public');
            $muzaki->foto=$file;
        }
        $muzaki->save();
        return redirect()->route('muzaki.create')->with('status',"Data dengan nama <strong>$muzaki->nama_muzaki</strong> berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $muzaki=\App\Muzaki::with('pembayaran')->where('id','=',"$id")->first();
        return view('muzaki.detail',['muzaki'=>$muzaki]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $muzaki=\App\Muzaki::findOrFail($id);

        return view('muzaki.edit',['muzaki'=>$muzaki]);
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
            "foto"=>"image|max:3124"  
            ],$this->massage()

           )->validate();
        $muzaki=\App\Muzaki::findOrFail($id);
        $muzaki->nama_muzaki=$request->get('nama');
        $muzaki->alamat=$request->get('alamat');
        $muzaki->no_hp=$request->get('nohp');
        $muzaki->kelamin=$request->get('kelamin');
        if($request->file('foto')){
            if($muzaki->foto and file_exists(storage_path('app/public/'.$muzaki->foto))){
                \Storage::delete('public/'.$muzaki->foto);
            }
        $file=$request->file('foto')->store('foto_muzaki','public');
        $muzaki->foto=$file;
        }

        $muzaki->save();
        return redirect()->route('muzaki.edit',['id'=>$muzaki->id])->with('status',"Data dengan nama <strong>$muzaki->nama_muzaki</strong> berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muzaki=\App\Muzaki::findOrFail($id);
        $muzaki->pembayaran()->delete();
        $muzaki->delete();
        return redirect()->route('muzaki.index')->with('status',"Data berhasil dihapus");
    }
}
