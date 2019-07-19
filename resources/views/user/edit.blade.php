@extends('layouts.template')

@section('judul')
Ubah data admin
@endsection

@section('pg-header')
<i class="ace-icon fa fa-user user-icon"></i>&nbsp; Ubah data admin
@endsection

@section('pg-text')
Ini adalah halaman ubah data admin
@endsection

@section('content')
	<a href="	{{route('users.show',['id'=>$user->id])}}
	" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
	<div class="space-3"></div>
	<br />	


<div class="col-xs-12 col-sm-3 center">
				<span class="profile-picture">
					<img id="avatar" class="editable img-responsive" width="200" height="180" alt="Alex's Avatar" src="
					@if($user->foto != null)
					{{asset('public/storage/'.$user->foto)}}

					@else
					{{asset('public/assets/images/avatars/profile-pic.jpg')}}
					@endif
					" />
				</span>

				<div class="space-4"></div>

				<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
					<div class="inline position-relative">
							<span class="white">{{$user->name}}</span>													
					</div>
				</div>
</div><!-- ini foto -->

<div class="col-xs-12 col-sm-9">

				<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Udah Data Admin</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

						<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('users.update',['id' => $user->id])}}" method="post">
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


							<div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
								<label class="col-sm-3 control-label no-padding-right" for="nama"> Nama </label>

								<div class="col-sm-9">
									<input type="text" name="nama" value="{{$user->name}}" id="nama" placeholder="nama" class="col-xs-10 col-sm-12" />
									@if($errors->has('nama') )
									<span class="text-danger">{{ $errors->first('nama') }}</span>
									@endif
									
								</div>

							</div>	

							<div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
								<label class="col-sm-3 control-label no-padding-right" for="username"> Username </label>

								<div class="col-sm-9">
									<input type="text" name="username" disabled value="{{$user->username}}" id="username" placeholder="Username" class="col-xs-10 col-sm-12" />
									@if($errors->has('username') )
									
									<span class="text-danger">{{ $errors->first('username') }}</span>
									@endif
								</div>
							</div>


						<div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
							<label class="col-sm-3 control-label no-padding-right" for="password"> Password</label>

							<div class="col-sm-9">
								<input type="password" name="password" name="password" id="password" placeholder="Password" class="col-xs-10 col-sm-12" />
								@if($errors->has('password') )
								<span class="text-danger">{{ $errors->first('password') }}</span>
								@endif
							
							</div>
						</div>		

						<div class="form-group {{$errors->has('confirmation') ? 'has-error' : ''}}">
							<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Password Confirmation</label>

							<div class="col-sm-9">
								<input type="password" name="confirmation" id="confirmation" placeholder="Password" class="col-xs-10 col-sm-12" />
								@if($errors->has('confirmation') )
								<span class="text-danger">{{ $errors->first('confirmation') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group {{$errors->has('foto') ? 'has-error' : ''}}">
							<label class="col-sm-3 control-label no-padding-right" for="id-input-file-2"> Upload Foto</label>
							<div class="col-xs-9 col-sm-9">
							<input type="file" id="id-input-file-2" name="foto" />
							@if($errors->has('foto') )
								<span class="text-danger">{{ $errors->first('foto')=="The foto failed to upload." ? "File Tidak boleh lebih dari 3MB" : $errors->first('foto') }}</span>
							@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Role</label>

							<div class="col-sm-9">
								<select name="role" class="col-xs-10 col-sm-12" >
									<option value="MASTER" {{$user->roles=="MASTER" ? 'selected' : ''}}>MASTER</option>
									<option value="ADMIN" {{$user->roles=="ADMIN" ? 'selected' : ''}}>ADMIN</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3"></div>
							<div class="col-sm-9 text-right">
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

