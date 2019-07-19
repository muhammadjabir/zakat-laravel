@extends('layouts.template')

@section('judul')
Halaman Tambah Tipe Mustahik
@endsection
@section('activepage','Tipe Mustahik')
@section('pg-header')
<i class="ace-icon fa fa-table table-icon"></i>&nbsp; Edit Tipe Mustahik
@endsection

@section('pg-text')
Ini adalah halaman tambah tipe mustahik
@endsection

@section('content')	
<div class="back">
	<a href="{{route('tipemustahik.index')}}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
	<div class="space-3"></div>
	<br />	
</div>
	<div class="col-md-6">
				
					
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Edit Data Tipe Mustahik</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

								<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('tipemustahik.update',['id'=>$tipe->id])}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="PUT">
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


									<div class="form-group {{$errors->has('tipe') ? "has-error" : ""}}">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Tipe Mustahik </label>

										<div class="col-sm-9">
											<input type="text" value="{{$tipe->tipe_mustahik}}" name="tipe" id="nama" placeholder="nama" class="col-xs-10 col-sm-12" />
											@if($errors->has('tipe'))
											<span class="text-danger">{{$errors->first('tipe')}}</span>
											@endif
										</div>
									</div>	

									
									<div class="form-group">
									<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<input type="submit" name="submit" value="Update Data" class="btn btn-sm btn-success btn-block">
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>

					
		</div>
		
@endsection

@section('script')
<script type="text/javascript">
	
</script>
@endsection

