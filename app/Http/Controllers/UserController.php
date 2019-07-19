<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
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
         $user=\App\User::all();
        return view('user.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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

            "username.required"=>"Username tidak boleh kosong",
            "username.regex"=>"Username tidak Valid",
            "username.min"=>"Username Tidak boleh kurang dari 6",
            "username.max"=>"Tidak Boleh Lebih dari 50",
            "username.unique"=>"Username Sudah Ada",

            "password.required"=>"Password Tidak Boleh Kosong",
            "password.min"=>"Password Tidak Boleh Kuang 6",
            "confirmation.required"=>"Tidak Boleh Kosong",
            "confirmation.same"=>"Password Tidak Sama",
            
            "foto.image"=>"Format Harus Gambar",
            "foto.max"=>"File tidak boleh lebih dari 3MB",
            "role.required"=>"Role Harus Dipilih"

            ];

        return $massage;

    }

    public function store(Request $request)
    {
         
         $validation=\Validator::make($request->all(),[
            "nama"=>"required|regex:/(^[A-Za-z ]+$)+/|min:5|max:40",
            "username"=>"required|regex:/^[A-Za-z][A-Za-z0-9]*$/|min:6|max:50|unique:users",
            "password"=>"required|min:6",
            "confirmation"=>"required|same:password",
            "role"=>"required",
            "foto"=>"image|max:3124"  
            ],$this->massage()

           )->validate();

        $new_user = new \App\user;
        $new_user->name=$request->get('nama');
        $new_user->username=$request->get('username');
        $new_user->roles=$request->get('role');
        $new_user->password=\Hash::make($request->get('password'));
 
        
        if($request->file('foto')){
            $file=$request->file('foto')->store('avatars','public');
            $new_user->foto=$file;
        }

        $new_user->save();
        return redirect()->route("users.create")->with('status' , 'Berhasil Tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=\App\User::findOrFail($id);
        return view('user.detail',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$page=null)
    {   
        $hal=$page;
        $user=\App\User::findOrFail($id);
        return view('user.edit',['user'=>$user,'page'=>$hal]);
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
            "confirmation"=>"same:password",
            "role"=>"required",
            "foto"=>"image|max:3124"  
            ],$this->massage()

           )->validate();


       $user=\App\User::findOrFail($id);

       $user->name=$request->get('nama');
       if($request->get('password')){
         $user->password=$request->get('password');
       }
       $user->roles=$request->get('role');
      
       if($request->file('foto')){
            if($user->foto and file_exists(storage_path('app/public/'.$user->foto))){
                \Storage::delete('public/'.$user->foto);
            }
            $file=$request->file('foto')->store('avatars','public');
            $user->foto=$file;
        }
        $user->save();

        if($user->save()){
            return redirect()->route('users.edit',['id'=>$user->id])->with('status','Berhasil edit data');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=\App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status','Data berhasil dihapus');
    }
}
