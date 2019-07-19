@extends('layouts.template')

@section('judul')
Halaman Tambah Data muzaki
@endsection
@section('activepage','Data Muzaki')
@section('pg-header')
<i class="ace-icon fa fa-users users-icon"></i>&nbsp; Tambah Data Muzaki
@endsection

@section('pg-text')
Ini adalah halaman tambah data muzaki
@endsection

@section('content')	
<div class="back">
	<a href="{{route('muzaki.index')}}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
	<div class="space-3"></div>
	<br />	
</div>
		
		
	<div class="col-md-6">
				
					
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Tambah Data Muzaki</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

								<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('muzaki.store')}}" method="POST">
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


									<div class="form-group {{$errors->has('nama') ? "has-error" :''}}">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Nama Muzaki </label>

										<div class="col-sm-9">
											<input type="text" name="nama" value="{{old('nama')}}" id="nama" placeholder="Nama muzaki" class="col-xs-10 col-sm-12" />
											@if($errors->has('nama'))
												<span class="text-danger">{{$errors->first('nama')}}</span>
											@endif
										</div>
									</div>

									<div class="form-group {{$errors->has('alamat') ? "has-error" :''}}">
										<label class="col-sm-3 control-label no-padding-right" for="alamat"> Alamat </label>

										<div class="col-sm-9">
											<textarea name="alamat" id="alamat"  value="" placeholder="Alamat" class="col-xs-10 col-sm-12">{{old('alamat')}}</textarea>
											@if($errors->has('alamat'))
												<span class="text-danger">{{$errors->first('alamat')}}</span>
											@endif
										</div>
									</div>	

									<div class="form-group {{$errors->has('nohp') ? "has-error" :''}}">
										<label class="col-sm-3 control-label no-padding-right" for="nohp"> No HP </label>

										<div class="col-sm-9">
											<input type="text" name="nohp" value="{{old('nohp')}}" id="nohp" placeholder="Contoh : 0866699966" class="col-xs-10 col-sm-12" />
											@if($errors->has('nohp'))
												<span class="text-danger">{{$errors->first('nohp')}}</span>
											@endif
										</div>
									</div>

									<div class="form-group {{$errors->has('foto') ? "has-error" :''}}">
										<label class="col-sm-3 control-label no-padding-right" for="id-input-file-2"> Upload Foto</label>
										<div class="col-xs-9 col-sm-9">
										<input type="file"  id="id-input-file-2" name="foto" />
										@if($errors->has('foto'))
												<span class="text-danger">{{ $errors->first('foto')=="The foto failed to upload." ? "File Tidak boleh lebih dari 3MB" : $errors->first('foto') }}</span>
											@endif
										</div>
									</div>

									<div class="form-group {{$errors->has('kelamin') ? "has-error" :''}}">
										<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Kelamin</label>

										<div class="col-sm-9">
											<select name="kelamin" class="col-xs-10 col-sm-12" >
											<option value="">Pilih Kelamin</option>
											<option value="PRIA">PRIA</option>
											<option value="WANITA">WANITA</option>
											</select>
											@if($errors->has('kelamin'))
											<span class="text-danger">{{ $errors->first('kelamin') }}</span>
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
		
@endsection

@section('script')
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
	
</script>
@endsection

