@extends('layouts.template')

@section('judul')
Halaman Data Pembayaran Zakat {{ucfirst(strtolower(Request::get('filter')))}}
@endsection
@section('activepage','Pembayaran')
@section('pg-header')
<i class="ace-icon fa fa-users users-icon"></i>&nbsp; Data Pembayaran Zakat {{ucfirst(strtolower(Request::get('filter')))}}
@endsection

@section('pg-text')
Ini adalah halaman Data Pembayaran Zakat {{ucfirst(strtolower(Request::get('filter')))}}
@endsection

@section('content')



<div class="col-md-12">

			<div class="table-header ">
				Data Pembayaran Zakat {{ucfirst(strtolower(Request::get('filter')))}}
			</div>
			
			<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th width="180">Nama Muzaki</th>
						<th>Alamat</th>
						<th width="180">Tipe Zakat</th>
						<th width="180">Zakat Yang Dibayarkan</th>
						<th width="180">Tahun</th>
						<th width="130">Action</th>
					</tr>
				</thead>

				<tbody>

					@foreach($pembayaran as $pembayaran)
					<tr>
					<td>{{$pembayaran->muzaki->nama_muzaki}}</td>
					<td>{{$pembayaran->muzaki->alamat}}</td>
					<td>{{$pembayaran->tipe_zakat}}</td>
					<td class="text-right">
						@if($pembayaran->tipe_zakat=='FITRAH')
							@if($pembayaran->bayar == 3)
								{{$pembayaran->bayar}}Kg - Beras
							@else
								Rp. {{number_format($pembayaran->bayar)}}
							@endif
						@else
							Rp.{{number_format($pembayaran->bayar)}}
						@endif
					</td>
					<td>{{$pembayaran->created_at}}</td>
				
					<td>
					<a href="{{route('muzaki.show',['id'=>$pembayaran->muzaki->id])}}" class="btn btn-xs btn-info" title="lihat detail"><i class="ace-icon fa fa-eye bigger-120"></i>&nbsp; Lihat Detail</a>
					
					</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	
</div>






@endsection
@section('script')

<script src="{{asset('public/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTables.select.min.js')}}"></script>

<script type="text/javascript">
$(document).ready( function () {
	$('.table').DataTable();
} );
</script>
@endsection
