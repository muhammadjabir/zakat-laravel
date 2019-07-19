@extends('layouts.template')

@section('judul')
Halaman Tipe Mustahik
@endsection
@section('activepage','Tipe Mustahik')
@section('spesifikasi')
<link rel="stylesheet" href="{{asset('public/assets/css/jquery-ui.custom.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/css/jquery.gritter.min.css')}}" />
@endsection
@section('pg-header')
<i class="ace-icon fa fa-table table-icon"></i>&nbsp;Tambah Tipe Mustahik
@endsection

@section('pg-text')
Ini adalah halaman tipe mustahik 
@endsection

@section('content')	

						
<div class="col-md-6">
			
				
	
		<div id="accordion" class="accordion-style1 panel-group"> <!-- tambah -->
																							
			<a class="btn btn-success btn-sm" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Tambah Tipe Mustahik +
			</a>

														

				<div class="panel-collapse collapse {{$errors->has('tipe') ? 'in' : ''}} {{session('status') ? 'in' : ''}}" id="collapseTwo">
						
				
							<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Tambah Data Tipe Mustahik</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">


											<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('tipemustahik.store')}}" method="POST">
												@csrf
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
														{!! session('status') !!}
													</div>
								
											
													@endif
												<div class="form-group {{$errors->has('tipe') ? 'has-error' : ''}}">
													<label class="col-sm-3 control-label no-padding-right" for="nama"> Tipe Mustahik </label>

													<div class="col-sm-9">
														<input type="text" name="tipe" id="nama" placeholder="Tipe Mustahik" class="col-xs-10 col-sm-12" />
														@if($errors->has('tipe'))
														<span class="text-danger">{{$errors->first('tipe')}}</span>
														@endif
													</div>
												</div>	

												
												<div class="form-group">
												<div class="col-sm-3"></div>
													<div class="col-sm-9">
														<input type="submit" name="submit" value="Tambah Data" class="btn btn-sm btn-primary btn-block">
													</div>
												</div>
											</form>	
										</div>
									</div>
								</div>
					
				</div>
		</div>	 <!-- tambah -->


				<div class="table-header ">
					Data Tipe Mustahik
				</div>

				<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive-sm">
				<thead>
					<tr>
						<th>Tipe Mustahik</th>
					
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($data as $datas)
					<tr>
					<td>{{$datas->tipe_mustahik}}</td>
		
					<td>
					<a href="{{route('tipemustahik.edit',['id'=>$datas->id])}}" class="btn btn-xs btn-success  tooltip-success "data-rel="tooltip" data-placement="top" title="Edit Data"><i class="ace-icon fa fa-pencil bigger-120" ></i></a>

					<a href="#modal-form{{$datas->id}}" role="button" data-toggle="modal" class="btn btn-xs btn-danger tooltip-error" data-rel="tooltip" data-placement="top" title="Hapus Data"><i class="ace-icon fa fa-trash bigger-120" ></i></a>

					
					<form method="post" action="{{route('tipemustahik.destroy',['id'=>$datas->id])}}">
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
									<p>Apa yakin memindahkan data tipe mustahik <strong>{{$datas->tipe_mustahik}}</strong> ke Trash ?</p>
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



$('[data-rel=tooltip]').tooltip();
</script>
@endsection

