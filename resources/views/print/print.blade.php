@extends('layouts.template')

@section('judul')
Halaman Cetak Laporan
@endsection
@section('activepage','Pembagian')
@section('pg-header')
<i class="ace-icon fa fa-print users-icon"></i>&nbsp; Cetak Laporan
@endsection

@section('pg-text')
Halaman Cetak Laporan
@endsection

@section('content')



<div class="col-md-12 center" style="background-color: white; -webkit-box-shadow: 9px 13px 22px -8px rgba(0,0,0,0.75);
-moz-box-shadow: 9px 13px 22px -8px rgba(0,0,0,0.75);
box-shadow: 9px 13px 22px -8px rgba(0,0,0,0.75);
padding: 20px">
	<a href="{{route('print',['filter'=>"mustahik"])}}" class="btn btn-primary" target="_blank"><i class="menu-icon fa fa-file"></i>&nbsp;Cetak Data Mustahik</a>
	


	<a href="{{route('print',['filter'=>"muzaki"])}}" class="btn btn-info" target="_blank"><i class="menu-icon fa fa-file"></i>&nbsp;Cetak Data Muzaki</a>
	


	<a href="" role="button" id="pembagian" data-toggle="modal" class="btn btn-danger  tooltip-error " data-rel="tooltip" data-placement="top"><i class="menu-icon fa fa-file"></i>&nbsp;Cetak Pembagian Zakat</a>
	<a href="" class="btn bg-dark" id="pembayaran"><i class="menu-icon fa fa-file"></i>&nbsp;Cetak Pembayaran Zakat</a>


	<form method="get" target="_blank" action="{{route('print')}}">
					
					<div id="modal-pembagian" class="modal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Cetak Laporan Pembagian Zakat</h4>
								</div>
								<div class="modal-body">
								<input type="text" class="form-control" required="" name="tahun" placeholder="Masukkan Tahun Contoh: 2019">
								<input type="hidden" value="pembagian" id="filter" name="filter">
								</div>

								<div class="modal-footer">
									<button class="btn btn-sm" data-dismiss="modal">
										<i class="ace-icon fa fa-times"></i>
										Cancel
									</button>

									<button class="btn btn-sm btn-primary">
										<i class="ace-icon fa fa-print"></i>
										Cetak
									</button>
								</div>
							</div>
						</div>
					</div><!-- PAGE CONTENT ENDS -->
					</form>
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

$('#pembayaran').on('click', function(e){
	e.preventDefault();
	var h = 'pembayaran';
	$('.tipe').remove();
	$('#modal-pembagian').modal('show');
	$('.blue').html('Cetak Laporan Pembayaran Zakat');
	$('#filter').val(h);
	$('.modal-body').prepend(`
		<select class="form-control tipe" name="tipe">
			<option value="Fitrah">Fitrah</option>
			<option value="Mal">Mal</option>
		</select>
		<br class="tipe">`)
}
)

$('#pembagian').on('click', function(e){
	e.preventDefault();
	var h = 'pembagian';
	$('#modal-pembagian').modal('show');
	$('.blue').html('Cetak Laporan Pembagian Zakat');
	$('#filter').val(h);
	$('.tipe').remove();

}
)
</script>
@endsection
