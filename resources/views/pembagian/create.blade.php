@extends('layouts.template')

@section('judul')
Halaman Pembagian Zakat 
@endsection
@section('activepage','Pembagian')
@section('pg-header')
<i class="ace-icon fa fa-leaf leaf-icon"></i> &nbsp; Pembagian Zakat 
@endsection

@section('pg-text')
Ini Adalah Halaman Pembagian Zakat
@endsection

@section('content')
		<a href="{{ route('mustahik.index') }}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
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
</div><!-- ini foto -->

<div class="col-sm-9">

		<div class="infobox infobox-blue infobox-large infobox-dark">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-money"></i>
			</div>
			<div class="infobox-data">
				<div class="infobox-content">Total Uang</div>
				<div class="infobox-content">Rp.{{number_format($totaluang, 2)}}</div>
			</div>
		</div>

		<div class="infobox infobox-grey infobox-large infobox-dark">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-leaf"></i>
			</div>

			<div class="infobox-data">
				<div class="infobox-content">Total Beras</div>
				<div class="infobox-content">{{$totalberas}}Kg</div>
			</div>
		</div>
		
</div>
<div class="col-xs-12 col-sm-9">

	<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Pembagian Zakat</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

								<form class="form-horizontal" role="form" action="{{route('pembagian.store')}}" method="POST">
									@csrf

											
												
													<div class="space-2"></div>
													<div class="alert alert-{{session('status') ? 'success' : 'info'}} col-md-12">
														<button type="button" class="close" data-dismiss="alert">
															<i class="ace-ico fa fa-times"></i>
														</button>
														<strong>
															<i class="ace-icon fa fa-{{session('status') ? 'check' : 'info'}}"></i>
															{{session('status') ? 'Selamat' : 'Info : '}}
														</strong>
														@if(session('status'))
														{!! session('status') !!}
														@else
														&nbsp;Beras Dan Uang yang ingin diberikan kepada mustahik tidak boleh lebih dari total beras dan total uang yang ada
														@endif
													</div>
													<br>

													@if(session('gagal'))
													<div class="alert alert-danger col-md-12">
														<button type="button" class="close" data-dismiss="alert">
															<i class="ace-ico fa fa-times"></i>
														</button>
														<strong>
															<i class="ace-icon fa fa-error}}"></i>
															
														</strong>
														
														{{ session('gagal') }}
														
													</div>
													@endif
								
								
									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Nama mustahik </label>

										<div class="col-sm-9">
											<input type="text" name="nama" id="nama" value="{{$mustahik->nama_mustahik}}" placeholder="Nama mustahik" class="col-xs-10 col-sm-12" disabled />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tipe"> Tipe mustahik </label>

										<div class="col-sm-9">
											<input type="text" name="tipe" id="tipe" value="{{$mustahik->tipemustahiks->tipe_mustahik}}" placeholder="Tipe Mustahik" class="col-xs-10 col-sm-12" disabled />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="alamat"> Alamat </label>

										<div class="col-sm-9">
											<textarea name="alamat" id="alamat" placeholder="Alamat" class="col-xs-10 col-sm-12" disabled>{{$mustahik->alamat}}</textarea>
										</div>
									</div>

									<div class="form-group {{$errors->has('beras') ? 'has-error' : '' }}">
										<label class="col-sm-3 control-label no-padding-right" for="nama">Beras</label>

										<div class="col-sm-4">

											<input type="text" onkeypress="return isNumberKey(event,this)" name="beras" id="total" value="{{old('beras')}}" placeholder="Satuan Kg Contoh : 1.5 / 2" class="col-xs-10 col-sm-12" />
											@if($errors->has('beras'))
											<span class="text-danger">{{$errors->first('beras')}}</span>
											@endif
										</div>
									</div>
										<div class="form-group {{$errors->has('uang') ? 'has-error' : '' }}">
											
											<label class="col-sm-3 control-label no-padding-left" >Uang</label>
											<div class="col-sm-4">
											<input type="text" name="uang" onkeypress="return hanyaAngka(event)" id="keluar" value="{{old('uang')}}" placeholder="Jumlah Uang Yang Diberikan" class="col-xs-10 col-sm-12" />
											@if($errors->has('uang'))
											<span class="text-danger">{{$errors->first('uang')}}</span>
											@endif
											</div>
										</div>
									
									<input type="hidden" value="{{Request::get('id')}}" name="id_mustahik">
									<div class="form-group">
									<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<input type="submit" name="submit" value="Simpan Data"  class="btn btn-sm btn-success btn-block">
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



<script>
	     function isNumberKey(evt, obj) {

            var charCode = (evt.which) ? evt.which : event.keyCode
            var value = obj.value;
            var dotcontains = value.indexOf(".") != -1;
            if (dotcontains)
                if (charCode == 46) return false;
            if (charCode == 46) return true;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

      function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

	    return false;
	  return true;
	}

</script>




@endsection

