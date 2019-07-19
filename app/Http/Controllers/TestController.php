<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
    	
    //	return view('layouts.ajax');
        $coba=\App\Mustahik::with('tipemustahiks','pembagian')->get();
        return $coba;
    }

   
    public function search(Request $request){
        $keyword=$request->get('q');
        $categories=\App\User::where('name' , 'LIKE',"%$keyword%")->get();

        return $categories;

    }

    public function testdata(Request $request){
    	return $request->get('categories');
    }

}
