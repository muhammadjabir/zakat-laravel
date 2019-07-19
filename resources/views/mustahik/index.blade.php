@extends('layouts.template')
@section('activepage','Data Mustahik')
@section('judul')
Halaman Data Mustahik
@endsection

@section('pg-header')
<i class="ace-icon fa fa-users users-icon"></i>&nbsp; Data Mustahik
@endsection

@section('pg-text')
Ini adalah halaman data mustahik
@endsection

@section('content')



<div class="col-md-12">
				@if (session('status'))					
					
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
					
				@endif	

			<div class="" style="margin-bottom: 4px;">
				<a href="{{route('mustahik.create')}}" class="btn btn-success btn-sm clearfix" id="Tambah" >Tambah Data Mustahik +</a>
			</div>
			<div class="space-6"></div>

			<div class="table-header ">
				Data Mustahik
			</div>
			
			<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive-sm">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No HP</th>
						<th>Kelamin</th>
						<th>Tipe Mustahik</th>
						<th width="145">Pembagian Zakat</th>
						<th width="130">Action</th>
					</tr>
				</thead>

				<tbody>

					@foreach($data as $datas)
					<tr>
					<td>{{$datas->nama_mustahik}}</td>
					<td>{{$datas->alamat}}</td>
					<td>{{$datas->no_hp}}</td>
					<td>{{$datas->kelamin}}</td>
					<td>
							{{$datas->tipemustahiks->tipe_mustahik}}

					</td>
					<td align="center">
						<a href="{{route('pembagian.create',['id'=>$datas->id])}}"  class="btn btn-xs btn-success" >Berikan Zakat</a>
					</td>
				
					<td>
					<a href="{{route('mustahik.show',['id'=>$datas->id])}}" class="btn btn-xs btn-info  tooltip-info " data-rel="tooltip" data-placement="top" title="Lihat Detail"><i class="ace-icon fa fa-eye bigger-120"></i></a>
					<a href="#modal-form{{$datas->id}}" role="button" data-toggle="modal" class="btn btn-xs btn-danger  tooltip-error " data-rel="tooltip" data-placement="top" title="Hapus Data" ><i class="ace-icon fa fa-trash bigger-120"></i></a>

					
					<form method="post" action="{{route('mustahik.destroy',['id'=>$datas->id])}}">
					@csrf
					<input type="hidden" value="DELETE" name="_method">
					<div id="modal-form{{$datas->id}}" class="modal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Hapus data</h4>
								</div>
								<div class="modal-body">
									<p>Apa yakin menghapus data dengan nama <strong>{{$datas->nama_mustahik}}</strong></p>
								</div>

								<div class="modal-footer">
									<button class="btn btn-sm" data-dismiss="modal">
										<i class="ace-icon fa fa-times"></i>
										Cancel
									</button>

									<button class="btn btn-sm btn-danger">
										<i class="ace-icon fa fa-trash"></i>
										Hapus data
									</button>
								</div>
							</div>
						</div>
					</div><!-- PAGE CONTENT ENDS -->
					</form>

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
