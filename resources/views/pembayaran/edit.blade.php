@extends('layouts.template')

@section('judul')
Halaman Edit Pembayaran Zakat {{ucfirst(strtolower($pembayaran->tipe_zakat))}}
@endsection
@section('activepage','Pembayaran')
@section('pg-header')
<i class="ace-icon fa fa-leaf leaf-icon"></i> &nbsp; Edit Pembayaran Zakat {{ucfirst(strtolower($pembayaran->tipe_zakat))}}
@endsection

@section('pg-text')
Ini Adalah Halaman Edit Pembayaran Zakat {{ucfirst(strtolower($pembayaran->tipe_zakat))}}
@endsection

@section('content')
		<a href="{{ route('muzaki.show',['id'=>$pembayaran->muzaki->id]) }}" class="btn btn-sm btn-light"><i class="fa fa-angle-double-left"></i>&nbsp; Kembali ke halaman Sebelumnya</a>
		<div class="space-3"></div>
		<br />	

<div class="col-xs-12 col-sm-3 center">
				<span class="profile-picture">
					<img id="avatar" class="editable img-responsive" width="200" height="180" alt="Alex's Avatar" src="
					@if($pembayaran->muzaki->foto != null)
					{{asset('public/storage/'.$pembayaran->muzaki->foto)}}

					@else
					{{asset('public/assets/images/avatars/profile-pic.jpg')}}
					@endif
					" />
				</span>

				<div class="space-4"></div>

				<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
					<div class="inline position-relative">
							<span class="white">{{$pembayaran->muzaki->nama_muzaki}}</span>													
					</div>
				</div>
</div><!-- ini foto -->

<div class="col-xs-12 col-sm-9">
	<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Edit Pembayaran Zakat {{ucfirst(strtolower($pembayaran->tipe_zakat))}}</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							

								<form class="form-horizontal" role="form" action="{{route('pembayaran.update',['id'=>$pembayaran->id])}}" method="POST">
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
														{!! session('status') !!}
													</div>
								
											
									@endif


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Nama Muzaki </label>

										<div class="col-sm-9">
											<input type="text" name="nama" id="nama" value="{{$pembayaran->muzaki->nama_muzaki}}" placeholder="Nama muzaki" class="col-xs-10 col-sm-12" disabled="" />
										</div>
									</div>

									@if($pembayaran->tipe_zakat == "FITRAH")
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="confirmation"> Pilih Pembayaran</label>

										<div class="col-sm-9">
											<select name="bayar" class="col-xs-10 col-sm-12" >
											<option value="">Pilih Pembayaran</option>
											<option value="3" {{$pembayaran->bayar == 3 ? 'selected' : ''}}>BERAS</option>
											<option value="30000"{{$pembayaran->bayar != 3 ? 'selected' : ''}}>UANG</option>
											</select>
										</div>
									</div>
									@else
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama"> Total Harta Yang Dimiliki </label>

										<div class="col-sm-9">
											<input type="text" onkeypress="return hanyaAngka(event)" name="total" id="total" value="" placeholder="Total Harta" class="col-xs-10 col-sm-12" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-9 control-label no-padding-right" ></label>

										<div class="col-sm-3">
											<p class="btn btn-xs btn-primary btn-block" id="hitung">Hitung Zakat</p>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" >Total Yang Harus Dikeluarkan</label>
										<div class="col-sm-9">
											<input type="text" name="" id="keluar" value="{{$pembayaran->bayar}}" placeholder="Total Yang Harus dikeluarkan" class="col-xs-10 col-sm-12" disabled />
										</div>
									
									</div>
									<input type="hidden" value="{{$pembayaran->bayar}}" name="bayar" id="totalBayar">
										@endif
									<input type="hidden" value="{{$pembayaran->tipe_zakat}}" name="zakat">
									
									<div class="form-group">
									<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<input type="submit" name="submit" value="UBAH DATA"  class="btn btn-sm btn-success btn-block">
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

@if($pembayaran->tipe_zakat == "MAL")
<script>
	var x = document.getElementById("hitung");

	x.addEventListener("click", myFunction);


	function myFunction() {
		var value = document.getElementById("total").value;
		var keluar = value*0.025;
	  document.getElementById("keluar").value =keluar.toFixed(2) ;
	  document.getElementById("totalBayar").value =keluar.toFixed(2) ;
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

