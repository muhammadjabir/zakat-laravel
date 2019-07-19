@extends('layouts.template')
@section('activepage','Trash')
@section('judul')
Halaman Data Trash Pembayaran Zakat
@endsection

@section('pg-header')
<i class="ace-icon fa fa-money money-icon"></i>&nbsp; Data Trash Pembayaran Zakat
@endsection

@section('pg-text')
Ini adalah halaman data pembayaran zakat yang telah dihapus
@endsection

@section('content')
	



<div class="col-md-12">

@if (session('status'))	
			
	<div class="" style="margin-bottom: 4px;">
		<div class="alert alert-success">
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
			


	

	<div>
		<div class="table-header">
					Data Trash Pembayaran Zakat Muzaki
		</div>

		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Nama Muzaki</th>
							<th>Total Pembayaran</th>
							<th>Metode Pembayaran</th>
							<th>Tipe Zakat</th>
							<th>Waktu Pembayaran</th>
							<th width="230">Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach($pembayaran as $zakat)
						<tr>
						<td>{{$zakat->muzaki->nama_muzaki}}</td>
						<td align="right">
						@if($zakat->bayar == 3)
						{{$zakat->bayar}}Kg
						@else
						Rp.{{number_format($zakat->bayar, 2)}}
						@endif
						</td>

						
						<td>{{$zakat->bayar == 3 ? "BERAS" : "UANG"}}</td>
						<td>{{$zakat->tipe_zakat}}</td>
						<td>{{$zakat->created_at}}</td>
						<td>
						<a href="{{route('restore',['id'=>$zakat->id,'data'=>Request::get('filter')])}}"  class="btn btn-xs btn-info  tooltip-info " data-rel="tooltip" data-placement="top" title="Restore"><i class="ace-icon fa fa-refresh bigger-120"></i>&nbsp;Restore</a>
						<a href="#modal-form{{$zakat->id}}" role="button" data-toggle="modal"  class="btn btn-xs btn-danger  tooltip-error " data-rel="tooltip" data-placement="top" title="Hapus Data"><i class="ace-icon fa fa-trash bigger-120" title="hapus data"></i>&nbsp;Delete Permanent</a>

						
						<form method="post" action="{{route('deletePermanent',['id'=>$zakat->id])}}">
						@csrf
						<input type="hidden" value="DELETE" name="_method">
						<input type="hidden" value="{{Request::get('filter')}}" name="data">
						<div id="modal-form{{$zakat->id}}" class="modal" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Hapus data</h4>
									</div>
									<div class="modal-body">
										<p>Apa yakin menghapus data pembayaran zakat ini ?</p>
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