@extends('layouts.print')
@section('title')
Pembayaran Zakat Fitrah
@endsection

@section('laporan')
Pembayaran Zakat {{Request::get('tipe')}} Tahun {{Request::get('tahun')}}
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">
            <thead class="text-center">
                            <tr>
                                <th>Nama Muzaki</th>
                                <th>Alamat</th>
                                <th>Kelamin</th>                                
                                <th>Tanggal/Tahun</th>
                                @if(Request::get('tipe')=='Fitrah')
                                <th>Metode Pembayaran</th>
                                @endif
                                <th>Jumlah</th>


                                
                            </tr>
                        </thead>

                        <tbody>
                       
                            @foreach($pembayaran as $v)
                            <tr>
                                
                                <td >{{$v->muzaki->nama_muzaki}}</td>
                                <td>{{$v->muzaki->alamat}}</td>
                                <td >{{$v->muzaki->kelamin}}</td>
                                <td >{{$v->created_at}}</td>
                                @if(Request::get('tipe')=='Fitrah')
                                <td>{{$v->bayar == 3 ? 'BERAS' : 'UANG'}}</td>
                                @endif
                                <td class="text-right">
                                    @if($v->bayar == 3)
                                    {{$v->bayar}}Kg
                                    @else
                                    Rp.{{number_format($v->bayar)}}
                                    @endif
                                </td>
        
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            @if(Request::get('tipe')=='Fitrah')
                            <tr>
                            <td colspan="4" class="font-weight-bold text-right">Total Beras Yang Masuk </td>
                            <td colspan="2" class="font-weight-bold text-right">{{$pembayaran->where('bayar','=',3)->sum('bayar')}}Kg</td>      </tr>
                            @endif
                            <tr>
                            <td colspan="{{Request::get('tipe') == 'Fitrah' ? '4' : '3'}}" class="font-weight-bold text-right">Total Uang Yang Masuk </td>
                            <td colspan="2" class="font-weight-bold text-right">Rp.{{number_format($pembayaran->where('bayar','>',3)->sum('bayar'))}} </td>                    
                            </tr>
                        </tfoot>
                       
                         
                    </table>

@endsection