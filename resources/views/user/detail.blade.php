@extends('layouts.template')

@section('judul')
Halaman Profil Admin
@endsection

@section('pg-header')
<i class="ace-icon fa fa-user user-icon"></i> &nbsp; Profil Admin
@endsection

@section('pg-text')
Ini adalah halaman Profil Admin
@endsection

@section('content')
		<a href="{{ url()->previous() }}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
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
<div class="profile-user-info profile-user-info-striped">
		<div class="profile-info-row">
					<div class="profile-info-name"> Nama </div>

					<div class="profile-info-value">
						<span class="editable" id="username">{{$user->name}}</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> Username </div>

					<div class="profile-info-value">
						<span class="editable" id="username">{{$user->username}}</span>
					</div>
				</div>


				<div class="profile-info-row">
					<div class="profile-info-name">Role </div>

					<div class="profile-info-value">
						<span class="editable" id="username">{{$user->roles}}</span>
					</div>
				</div>


		</div><!-- kanan -->
			<div class="space-4"></div>
			<div class="ubah container col-md-12">
				<a href="{{route('users.edit',['id'=>$user->id]

												)}}" class="btn btn-sm btn-success btn-block">Ubah Data</a>
			</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
</script>
@endsection

