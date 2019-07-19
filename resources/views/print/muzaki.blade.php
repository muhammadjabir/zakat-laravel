@extends('layouts.print')
@section('title')
Pembayaran Zakat
@endsection

@section('laporan')
Pembayaran Zakat
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">
            <thead class="text-center">
                            <tr>
                                <th>Foto</th>
                                <th>Nama Muzaki</th>
                                <th>Alamat</th>
                                <th>Kelamin</th>
                               

                                
                            </tr>
                        </thead>

                        <tbody>
                       
                            @foreach($muzaki as $muzaki)
                            <tr>
                                <td>@if($muzaki->foto)
                                    <img src="{{asset('public/storage/'.$muzaki->foto)}}" width="40" height="50">
                                    @else
                                    No Foto
                                    @endif</td>
                                <td>{{$muzaki->nama_muzaki}}</td>
                                <td >{{$muzaki->alamat}}</td>
                                <td >{{$muzaki->kelamin}}</td>
                                
                            </tr>

                          
                            @endforeach
                           
                        </tbody>
                        
                       
                         
                    </table>

@endsection