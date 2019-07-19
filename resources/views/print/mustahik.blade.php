@extends('layouts.print')
@section('title')
Print Data Mustahik
@endsection

@section('laporan')
Data Mustahik
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">
            <thead class="text-center">
                            <tr>
                                <th>Foto</th>
                                <th>Nama Mustahik</th>
                                <th>Alamat</th>
                                <th>Kelamin</th>
                                <th>Tipe mustahik</th>
                            
                                
                            </tr>
                        </thead>

                        <tbody>
                       
                            @foreach($mustahik as $mustahik)
                            <tr>
                                <td>
                                    @if($mustahik->foto)
                                    <img src="{{asset('public/storage/'.$mustahik->foto)}}" width="40" height="50">
                                    @else
                                    No Foto
                                    @endif
                                </td>
                                <td >{{$mustahik->nama_mustahik}}</td>
                                <td >{{$mustahik->alamat}}</td>
                                <td >{{$mustahik->kelamin}}</td>
                                <td>{{$mustahik->tipemustahiks->tipe_mustahik}}</td>
                               
                            </tr>

                             
                            @endforeach
                           
                        </tbody>
                       
                         
                    </table>

@endsection