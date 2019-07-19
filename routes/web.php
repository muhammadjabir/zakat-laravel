<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::match(["GET","POST"], "/register" ,function(){
	return redirect("/login");
})->name("register");


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tester' , 'TestController@index')->name('test');
Route::get('/trash' , 'TrashController@index')->name('trash');
Route::delete('/trash/{id}/permanent','TrashController@deletePermanent')->name('deletePermanent');
Route::get('/trash/{id}/restore','TrashController@restore')->name('restore');
Route::get('/search' , 'TestController@search')->name('search');
Route::post('/data' , 'TestController@testdata')->name('data');
Route::get('/print' , 'PrintController@print')->name('print');
Route::get('/laporan',function(){
	return view('print.print');
})->name('laporan');
Route::resource("users","UserController");
Route::resource("tipemustahik","TipemustahikController");
Route::resource("mustahik","MustahikController");
Route::resource("muzaki","MuzakiController");
Route::resource("pembayaran","PembayaranController");
Route::resource("pembagian","PembagianController");
