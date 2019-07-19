@extends('layouts.template')

@section('judul')
Halaman Profil Muzaki
@endsection
@section('activepage','Data Muzaki')
@section('pg-header')
<i class="ace-icon fa fa-user user-icon"></i> &nbsp; Profil Muzaki
@endsection

@section('pg-text')
Ini adalah halaman Profil Muzaki
@endsection

@section('content')
		<a href="{{route('muzaki.index')}}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
		<div class="space-3"></div>
		<br />	
@if (session('status'))
											
												
	<div class="space-2"></div>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-ico fa fa-times"></i>
		</button>
		<strong>
			<i class="ace-icon fa fa-check"></i>
			Selamat!
		</strong>
		{!! session('status') !!}
	</div>

											
@endif

	<div class="col-xs-12 col-sm-3 center">
				<span class="profile-picture">
					<img id="avatar" class="editable img-responsive" width="200" height="180" alt="Alex's Avatar" src="
					@if($muzaki->foto != null)
					{{asset('public/storage/'.$muzaki->foto)}}

					@else
					{{asset('public/assets/images/avatars/profile-pic.jpg')}}
					@endif
					" />
				</span>

				<div class="space-4"></div>

				<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
					<div class="inline position-relative">
							<span class="white">{{$muzaki->nama_muzaki}}</span>													
					</div>
				</div>
	</div><!-- ini foto -->

	<div class="col-xs-12 col-sm-9">
		<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> Nama </div>

						<div class="profile-info-value">
							<span class="editable" id="username">{{$muzaki->nama_muzaki}}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Alamat </div>

						<div class="profile-info-value">
							<span class="editable" id="username">{{$muzaki->alamat}}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name">No HP </div>

						<div class="profile-info-value">
							<span class="editable" id="username">{{$muzaki->no_hp}}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name">Kelamin </div>

						<div class="profile-info-value">
							<span class="editable" id="username">{{$muzaki->kelamin}}</span>
						</div>
					</div>

		</div><!-- kanan -->

			<div class="space-6"></div>
			<div class="clearFix">
				<div class="ubah col-md-12">
					<a href="{{route('muzaki.edit',['id'=>$muzaki->id])}}" class="btn btn-sm btn-success btn-block">Ubah Data</a>
				</div>
			</div>
	</div>


<div class="col-xs-12" style="margin: 0 auto; padding-left: 30px; padding-right:24px; ">
	<div class="space-8"></div>

		<div class="table-header center">
					Data Pembayaran Zakat Muzaki
		</div>

		<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>Total Pembayaran</th>
							<th>Metode Pembayaran</th>
							<th>Tipe Zakat</th>
							<th>Waktu Pembayaran</th>
							<th width="130">Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach($muzaki->pembayaran as $zakat)
						<tr>
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
						<a href="{{route('pembayaran.edit',['id'=>$zakat->id])}}"  class="btn btn-xs btn-success  tooltip-success " data-rel="tooltip" data-placement="top" title="Ubah Data" ><i class="ace-icon fa fa-pencil bigger-120" title="Ubah data"></i></a>
						<a href="#modal-form{{$zakat->id}}" role="button" data-toggle="modal"  class="btn btn-xs btn-danger  tooltip-error " data-rel="tooltip" data-placement="top" title="Hapus Data"><i class="ace-icon fa fa-trash bigger-120" title="hapus data"></i></a>

						
						<form method="post" action="{{route('pembayaran.destroy',['id'=>$zakat->id])}}">
						@csrf
						<input type="hidden" value="DELETE" name="_method">
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

