<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
         $this->middleware('auth');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=['mustahik'=>count(\App\Mustahik::all()),
        'muzaki'=>count(\App\Muzaki::all()),
        'pembagian'=>\App\Pembagian::all(),
        'pembayaran'=>\App\Pembayaran::all()];
        return view('home',['data'=>$data]);
    }
}
