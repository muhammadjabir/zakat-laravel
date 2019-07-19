@extends('layouts.template')

@section('spesifikasi')
	<link rel="stylesheet" href="{{asset('public/assets/css/jquery-ui.custom.min.css')}}" />
	
	<link rel="stylesheet" href="{{asset('public/assets/css/chosen.min.css')}}" />
@endsection

@section('judul')
Ubah data mustahik
@endsection
@section('activepage','Data Mustahik')


@section('pg-header')
<i class="ace-icon fa fa-user user-icon"></i>&nbsp; Ubah data mustahik
@endsection

@section('pg-text')
Ini adalah halaman ubah data mustahik
@endsection

@section('content')
	<a href="{{route('mustahik.index')}}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
	<div class="space-3"></div>
	<br />	


<div class="col-xs-12 col-sm-3 center">
				<span class="profile-picture">
					<img id="avatar" class="editable img-responsive" width="200" height="180" alt="Alex's Avatar" src="
					@if($mustahik->foto != null)
					{{asset('public/storage/'.$mustahik->foto)}}

					@else
					{{asset('public/assets/images/avatars/profile-pic.jpg')}}
					@endif
					" />
				</span>

				<div class="space-4"></div>

				<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
					<div class="inline position-relative">
							<span class="white">{{$mustahik->nama_mustahik}}</span>													
					</div>
				</div>
				<div class="space-4"></div>
</div><!-- ini foto -->

<div class="col-xs-12 col-sm-9">
				
					
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Edit Data Mustahik</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

								<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('mustahik.update',['id'=>$mustahik->id])}}" method="POST">
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


									<div class="form-group {{$errors->has('nama') ? "has-error" :''}}">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Nama Mustaik</label>

										<div class="col-sm-9">
											<input type="text" name="nama" value="{{$mustahik->nama_mustahik}}" id="nama" placeholder="Nama Mustahik" class="col-xs-10 col-sm-12" />
											@if($errors->has('nama'))
												<span class="text-danger">{{$errors->first('nama')}}</span>
											@endif
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="alamat"> Alamat </label>

										<div class="col-sm-9">
											<textarea name="alamat" id="alamat" placeholder="Alamat" class="col-xs-10 col-sm-12">{{$mustahik->alamat}}</textarea>
										</div>
									</div>	

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nohp"> No HP </label>

										<div class="col-sm-9">
											<input type="text" name="nohp" id="nohp" value="{{$mustahik->no_hp}}"placeholder="No HP" class="col-xs-10 col-sm-12" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id-input-file-2"> Upload Foto</label>
										<div class="col-xs-9 col-sm-9">
										<input type="file" id="id-input-file-2" name="foto" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Kelamin</label>

										<div class="col-sm-9">
											<select name="kelamin" class="chosen-select col-xs-10 col-sm-12" >
											<option value="">Pilih Kelamin</option>
											<option value="PRIA" {{$mustahik->kelamin == "PRIA" ? "selected" : ""}}>PRIA</option>
											<option value="WANITA" {{$mustahik->kelamin == "WANITA" ? "selected" : ""}}>WANITA</option>
											</select>
										</div>
									</div>

									<div class="form-group {{ $errors->first('tipe') ? "has-error" : ""}}">
										<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Tipe Mustahik</label>

										<div class="col-sm-9">
											<select name="tipe" class="chosen-select col-xs-10 col-sm-12" >
											<option value="">Pilih Tipe</option>
											@foreach($tipe as $tipes)
												<option value="{{$tipes->id}}" {{$tipes->tipe_mustahik == $mustahik->tipemustahiks->tipe_mustahik ? "selected" : ""}}>{{$tipes->tipe_mustahik}}</option>
												
											@endforeach
											</select>
											@if($errors->has('tipe'))
											<span class="text-danger">{{ $errors->first('tipe') }}</span>
											@endif
										</div>
									</div>

									
									<div class="form-group">
									<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-sm btn-success btn-block">
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>

					
		</div>

@endsection

@section('script')
<script src="{{asset('public/assets/js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript">

	$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
		jQuery(function($) {
				
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					
				}
		
			
			});
</script>

@endsection

