@extends('layouts.template')

@section('judul')
Halaman Pembayaran Zakat {{ucfirst(Request::get('zakat'))}}
@endsection
@section('activepage','Pembayaran')
@section('pg-header')
<i class="ace-icon fa fa-leaf leaf-icon"></i> &nbsp; Pembayaran Zakat {{ucfirst(Request::get('zakat'))}}
@endsection

@section('pg-text')
Ini Adalah Halaman Pembayaran Zakat {{ucfirst(Request::get('zakat'))}}
@endsection

@section('content')
		<a href="{{ route('muzaki.index') }}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
		<div class="space-3"></div>
		<br />	

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
	<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Pembayaran Zakat {{ucfirst(Request::get('zakat'))}}</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

								<form class="form-horizontal" role="form" action="{{route('pembayaran.store')}}" method="POST">
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


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Nama Muzaki </label>

										<div class="col-sm-9">
											<input type="text" name="nama" id="nama" value="{{$muzaki->nama_muzaki}}" placeholder="Nama muzaki" class="col-xs-10 col-sm-12" disabled="" />
										</div>
									</div>

									@if(Request::get('zakat') == "fitrah")
									<div class="form-group  {{$errors->has('bayar') ? 'has-error':''}}">
										<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Pilih Pembayaran</label>

										<div class="col-sm-9">
											<select name="bayar" class="col-xs-10 col-sm-12" >
											<option value="">Pilih Pembayaran</option>
											<option value="3">BERAS</option>
											<option value="30000">UANG</option>
											</select>
											@if($errors->has('bayar'))
											<span class="text-danger">Harus Dipilih</span>
											@endif
										</div>
									</div>
									@else
									<div class="form-group" id="formharta">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Total Harta </label>

										<div class="col-sm-9">
											<input type="text" onkeypress="return hanyaAngka(event)" name="total" id="total" value="" placeholder="Total Harta" class="col-xs-10 col-sm-12" />
											<span class="text-danger" id="pesanerror"></span>
										</div>
										
									</div>

									<div class="form-group">
										<label class="col-sm-9 control-label no-padding-right" ></label>

										<div class="col-sm-3">
											<p class="btn btn-xs btn-primary btn-block" id="hitung">Hitung Zakat</p>
										</div>
									</div>

									<div class="form-group {{$errors->has('bayar') ? 'has-error':''}}">
										<label class="col-sm-3 control-label no-padding-right" >Total yang dikeluarkan</label>
										<div class="col-sm-9">
											<input type="text" name="" id="keluar" value="" placeholder="Total Yang Harus dikeluarkar" class="col-xs-10 col-sm-12" disabled />
											@if($errors->has('bayar'))
											<span class="text-danger">{{$errors->first('bayar')}}</span>
											@endif
										</div>
									
									</div>
									<input type="hidden" value="" name="bayar" id="totalBayar">
										@endif
									<input type="hidden" value="{{strtoupper(Request::get('zakat'))}}" name="zakat">
									<input type="hidden" value="{{Request::get('id')}}" name="id_muzaki">
									<div class="form-group">
									<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<input type="submit" name="submit" value="BAYAR ZAKAT"  class="btn btn-sm btn-success btn-block">
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

@if(Request::get('zakat') == "mal")
<script>
	var x = document.getElementById("hitung");

	x.addEventListener("click", myFunction);


	function myFunction() {
		var value = document.getElementById("total").value;
		var minimal = 49000000;
		if( value < minimal ){
			document.getElementById("formharta").className += " has-error";
			document.getElementById('pesanerror').innerHTML="Total Harta Belum Wajib Zakat";
		}
		else{
			document.getElementById("formharta").className = "form-group";
			document.getElementById('pesanerror').innerHTML="";
		var keluar = value*0.025;
	  document.getElementById("keluar").value =keluar.toFixed(2) ;
	  document.getElementById("totalBayar").value =keluar.toFixed(2) ;
	  }
	}
</script>

<script>
	function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

	    return false;
	  return true;
	}
</script>



@endif
@endsection

