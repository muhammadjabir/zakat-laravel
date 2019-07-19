@extends('layouts.print')
@section('title')
Pembagian Zakat
@endsection

@section('laporan')
Pembagian Zakat Tahun {{Request::get('tahun')}}
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">
            <thead class="text-center">
                            <tr>
                                <th>Nama mustahik</th>
                                <th >Alamat</th>
                                <th>Kelamin</th>
                                <th>Beras Dibagikan</th>
                                <th>Uang Dibagikan</th>
                                <th>Tanggal/Tahun</th>


                                
                            </tr>
                        </thead>

                        <tbody>
                       
                            @foreach($pembagians as $pembagian)
                            <tr>
                                
                                <td >{{$pembagian->mustahik->nama_mustahik}}</td>
                                <td>{{$pembagian->mustahik->alamat}}</td>
                                <td >{{$pembagian->mustahik->kelamin}}</td>
                                <td >{{$pembagian->beras}}Kg</td>
                                <td>Rp.{{number_format($pembagian->uang)}}</td>
                                <td>{{$pembagian->created_at}}</td>
        
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="2" class="font-weight-bold text-right">Total Beras Yang Masuk </td>
                            <td colspan="2" class="font-weight-bold text-right">Total Beras Yang Dibagian </td>
                            <td colspan="2" class="font-weight-bold text-right">Beras Tersisa </td>
                      
                            </tr>

                             <tr>
                   
                            <td class="text-right" colspan="2">{{$total_beras}}Kg</td>
                            <td class="text-right" colspan="2">{{$pembagians->sum('beras')}}Kg</td>
                            <td class="text-right" colspan="2">{{$total_beras-$pembagians->sum('beras')}}Kg</td>
                            </tr>

                            <tr>
                           <td colspan="2" class="font-weight-bold text-right">Total Uang Yang Masuk </td>
                            <td colspan="2" class="font-weight-bold text-right">Total Uang Yang Dibagian </td>
                            <td colspan="2" class="font-weight-bold text-right">Uang Tersisa </td>
                            </tr>

                            <tr>
                            <td class="text-right" colspan="2">Rp.{{number_format($total_uang)}}</td>
                            <td class="text-right" colspan="2">Rp.{{number_format($pembagians->sum('uang'))}}</td>
                            <td class="text-right" colspan="2">Rp.{{number_format($total_uang-$pembagians->sum('uang'))}}</td>
                            </tr>
                        </tfoot>
                       
                         
                    </table>

@endsection