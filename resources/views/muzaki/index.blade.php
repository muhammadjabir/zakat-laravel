@extends('layouts.template')

@section('judul')
Halaman Data Muzaki
@endsection
@section('activepage','Data Muzaki')
@section('pg-header')
<i class="ace-icon fa fa-users users-icon"></i>&nbsp; Data Muzaki
@endsection

@section('pg-text')
Ini adalah halaman data muzaki
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
				<a href="{{route('muzaki.create')}}" class="btn btn-success btn-sm clearfix" id="Tambah" >Tambah Data Muzaki +</a>
			</div>
			<div class="space-6"></div>
			<div class="table-header ">
				Data Muzaki
			</div>
			
			<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No HP</th>
						<th>Kelamin</th>
						<th width="180">Pembayaran Zakat</th>
						<th width="130">Action</th>
					</tr>
				</thead>

				<tbody>

					@foreach($muzaki as $muzaki)
					<tr>
					<td>{{$muzaki->nama_muzaki}}</td>
					<td>{{$muzaki->alamat}}</td>
					<td>{{$muzaki->no_hp}}</td>
					<td>{{$muzaki->kelamin}}</td>
					<td>
					<a href="{{route('pembayaran.create',['id'=>$muzaki->id,'zakat'=>'fitrah'])}}" class="btn btn-secondary btn-xs">Zakat Fitrah</a>
					<a href="{{route('pembayaran.create',['id'=>$muzaki->id,'zakat'=>'mal'])}}" class="btn btn-success btn-xs">Zakat Mal</a>
					</td>
				
					<td>
					<a href="{{route('muzaki.show',['id'=>$muzaki->id])}}" class="btn btn-xs btn-info  tooltip-info " data-rel="tooltip" data-placement="top" title="Lihat Detail"><i class="ace-icon fa fa-eye bigger-120"></i></a>
					<a href="#modal-form{{$muzaki->id}}" role="button" data-toggle="modal" class="btn btn-xs btn-danger tooltip-error "data-rel="tooltip" data-placement="top" title="Hapus Data"><i class="ace-icon fa fa-trash bigger-120" title="hapus data"></i></a>

					
					<form method="post" action="{{route('muzaki.destroy',['id'=>$muzaki->id])}}">
					@csrf
					<input type="hidden" value="DELETE" name="_method">
					<div id="modal-form{{$muzaki->id}}" class="modal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Hapus data</h4>
								</div>
								<div class="modal-body">
									<p>Apa yakin menghapus data dengan nama <strong>{{$muzaki->nama_muzaki}}</strong></p>
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
