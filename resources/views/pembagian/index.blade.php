@extends('layouts.template')

@section('judul')
Halaman Data Pembagian Zakat
@endsection
@section('activepage','Pembagian')
@section('pg-header')
<i class="ace-icon fa fa-users users-icon"></i>&nbsp; Data Pembagian Zakat
@endsection

@section('pg-text')
Ini adalah halaman data mustahik
@endsection

@section('content')



<div class="col-md-12">
				@if (session('status'))					
					<div class="form-group">
						<div class="space-2"></div>
						<div class="alert alert-success col-md-12">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-ico fa fa-times"></i>
							</button>
							<strong>
								<i class="ace-icon fa fa-check"></i>
								Selamat!
							</strong>
							{{ session('status') }}
						</div>
					</div>
				@endif	

			<div class="" style="margin-bottom: 4px;">
				<a href="{{route('mustahik.index')}}" class="btn btn-success btn-sm clearfix" id="Tambah" >Tambah Data Pembagian Zakat +</a>
			</div>
			<div class="space-6"></div>

			<div class="table-header ">
				Data Pembagian Zakat
			</div>
			
			<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive-sm">
				<thead>
					<tr>
						<th width="150">Nama Mustahik</th>
						<th>Tahun</th>
						
						<th width="150">Tahun</th>
						<th width="150">Total Beras</th>
						<th width="150">Total Uang</th>
						<th width="130">Action</th>
					</tr>
				</thead>

				<tbody>
				
					@foreach($pembagian as $pembagian)
					 
					<tr>
					<td>{{$pembagian->mustahik->nama_mustahik}}</td>
					<td>{{$pembagian->mustahik->alamat}}</td>
				
					<td>{{$pembagian->created_at}}</td>
					<td class="text-right">{{$pembagian->beras}}Kg</td>
					<td class="text-right">Rp.{{number_format($pembagian->uang)}}</td>
				
					<td>
					<a href="{{route('mustahik.show',['id'=>$pembagian->mustahik->id])}}" class="btn btn-xs btn-info" title="lihat detail"><i class="ace-icon fa fa-eye bigger-120"></i>&nbsp; Lihat Detail</a>
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
