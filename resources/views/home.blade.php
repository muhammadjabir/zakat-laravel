@extends('layouts.template')
@section('activepage','Dashboard')

@section('judul','Halaman Dashboard')
@section('pg-header')
	<i class="menu-icon fa fa-tachometer"></i> &nbsp;Dashboard
@endsection

@section('content')
<div id="shadow" class="col-md-12 bg-primary shadow" style="margin-bottom: 10px !important;
-webkit-box-shadow: 2px 10px 11px -10px rgba(0,0,0,0.45);
-moz-box-shadow: 2px 10px 11px -10px rgba(0,0,0,0.45);
box-shadow: 2px 10px 11px -10px rgba(0,0,0,0.45);"><h2 class="text-center">Selamat Datang Di Aplikas Zakat BMT AT-TAQWA</h2></div>

<div class="col-md-6">
				<div class="infobox infobox-green">
				<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number" style="font-size: 14px;">{{$data['muzaki']}}</span>
				<div class="infobox-content">Data Muzaki</div>
				</div>
				<div class="badge" style="background-color: white;">
				<a href=""> Lihat Detail
				<i class="ace-icon fa fa-arrow-up"></i>
				</a>
				</div>
				</div>

				<div class="infobox infobox-blue">
				<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number" style="font-size: 14px;">{{$data['mustahik']}}</span>
				<div class="infobox-content">Data Mustahik</div>
				</div>

				<div class="badge" style="background-color: white;" >
				<a href="" > Lihat Detail
				<i class="ace-icon fa fa-arrow-up"></i>
				</a>
				</div>
				</div>

				<div class="infobox infobox-pink">
				<div class="infobox-icon">
				<i class="ace-icon fa fa-money"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number" style="font-size: 14px;">Rp.{{number_format($data['pembayaran']->where('bayar','>','3')->sum('bayar'))}}</span>
				<div class="infobox-content">Total Uang Masuk</div>
				</div>
				</div>

				<div class="infobox infobox-red">
				<div class="infobox-icon">
				<i class="ace-icon fa fa-money"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number" style="font-size: 14px;">Rp.{{number_format($data['pembagian']->sum('uang'))}}</span>
				<div class="infobox-content">Total Uang Dibagikan</div>
				</div>
				</div>

				<div class="infobox infobox-black">
				<div class="infobox-icon">
				<i class="ace-icon fa fa-flask"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number" style="font-size: 14px;">{{$data['pembayaran']->where('bayar','=','3')->sum('bayar')}}Kg</span>
				<div class="infobox-content">Total Beras Masuk</div>
				</div>
				</div>

				<div class="infobox infobox-orange2">
				<div class="infobox-icon">
				<i class="ace-icon fa fa-flask"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number" style="font-size: 14px;">{{$data['pembagian']->sum('beras')}}Kg</span>
				<div class="infobox-content">Total Beras Dibagikan</div>

				</div>

				</div>
	</div>

<div class="col-sm-6">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
			<li class="active">
				<a data-toggle="tab" href="#home4">Profil BMT AT-TAQWA</a>
			</li>

			<li>
				<a data-toggle="tab" href="#profile4">VISI</a>
			</li>

			<li>
				<a data-toggle="tab" href="#dropdown14">MISI</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="home4" class="tab-pane in active">
				<p class="text-justify">Baitul Maal Watamwil AT-TAQWA berdiri sejak tahun 1994, lahir sebagai solusi dari pembagian dana zakat, untuk memperdayakan masyarakat khususnya di sekitar masjid At-Taqwa dan sekitarnya. Dalam bentuk ZIS dan wakaf untuk dikelola secara produktif dan disalurkan dalam bentuk pembiayaan Al-Qard, serta dana simpanan dari anggota yang dikelola secara profitable untuk disalurkan kepada usaha mikro kecil dalam bentuk pembiayaan dalam bentuk pembiayaan dengan skema sistem bagi hasil dan jual beli.</p>
			</div>

			<div id="profile4" class="tab-pane">
				<p class="text-justify">“Menjadi lembaga keuangan Islam yang ikut menunjang dan memajukan perekonomian umat, sehingga menjadikan lembaga yang dapat dipercaya masyarakat dan tumbuh sebagai lembaga yang menjawab tantanganperekonomian nasional khususnya ekonomi mikro dalam mengentaskan kemiskinan.”</p>
			</div>

			<div id="dropdown14" class="tab-pane">
				<p class="text-justify">“Menjadikan BMT At-Taqwa sebagai koperasi jasa keuangan syariah yang dapat bersaing dalam hal kesehatan. Profitable efisien dan sebagai pilar ekonomi yaitu sebagai bagian dari syiar islam dalam bidang ekonomi.” </p>
			</div>
		</div>
	</div>
</div><!-- /.col -->									
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
