@extends('layouts.print')
@section('title')
Laba Zakat
@endsection

@section('laporan')
Laba Zakat
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">

                        <tbody>
                        <tr>
                            <td rowspan="2"  class="font-weight-bold text-center" style="vertical-align: middle;">Beras</td>
                            <td class="font-weight-bold text-center">Total Beras</td>
                            <td  class="font-weight-bold text-center">Beras Dibagikan</td>
                            <td  class="font-weight-bold text-center">Beras Tersisa</td>
                        </tr>
                        <tr>
                            <td class="text-right">{{$pembayaran->where('bayar',3)->sum('bayar')}}Kg</td>
                            <td class="text-right">{{$pembagian->sum('beras')}}Kg</td>
                            <td class="text-right">{{$pembayaran->where('bayar',3)->sum('bayar')-$pembagian->sum('beras')}}Kg</td>
                        </tr>

                        <tr>
                            <td rowspan="2"  class="font-weight-bold text-center" style="vertical-align: middle;">Uang</td>
                            <td class="font-weight-bold text-center">Total Uang</td>
                            <td  class="font-weight-bold text-center">Uang Dibagikan</td>
                            <td  class="font-weight-bold text-center">Uang Tersisa</td>
                        </tr>

                         <tr>
                            <td class="text-right">Rp.{{number_format($pembayaran->where('bayar','>',3)->sum('bayar'))}}</td>
                            <td class="text-right">Rp.{{number_format($pembagian->sum('uang'))}}</td>
                            <td class="text-right">Rp.{{number_format($pembayaran->where('bayar','>',3)->sum('bayar')-$pembagian->sum('uang'))}}</td>
                        </tr>
                        </tbody>
                        
                       
                         
                    </table>

@endsection