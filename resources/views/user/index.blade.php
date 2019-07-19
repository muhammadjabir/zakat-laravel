@extends('layouts.template')

@section('judul')
Halaman Data Admin
@endsection

@section('pg-header')
<i class="ace-icon fa fa-users users-icon"></i>&nbsp; Data Admin
@endsection

@section('pg-text')
Ini adalah halaman data Admin
@endsection

@section('content')



		<div class="col-md-12">
			
				@if (session('status'))
									
					<div class="form-group">
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
					</div>
				@endif	
			<div class="" style="margin-bottom: 4px;">
				<a href="{{route('users.create')}}" class="btn btn-success btn-sm clearfix" id="Tambah" >Tambah Admin +</a>
			</div>
				<div class="table-header ">
				Data Admin
				</div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive-sm">
						<thead>
							<tr>
								<th>Nama</th>
							
								<th>Username</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($users as $user)
							<tr>
							<td>{{$user->name}}</td>
					
							<td>{{$user->username}}</td>
							<td>{{$user->roles}}</td>
							<td>
							<a href="{{route('users.show',['id'=>$user->id])}}" class="btn btn-xs btn-info  tooltip-info "data-rel="tooltip" data-placement="top" title="Lihat Detail"><i class="ace-icon fa fa-eye bigger-120"></i></a>
							<a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-xs btn-success  tooltip-success "data-rel="tooltip" data-placement="top" title="Edit Data" ><i class="ace-icon fa fa-pencil bigger-120" ></i></a>
							<a href="#modal-form{{$user->id}}" role="button" data-toggle="modal" class="btn btn-xs btn-danger  tooltip-error "data-rel="tooltip" data-placement="top" title="Hapus Data"><i class="ace-icon fa fa-trash bigger-120" title="hapus data"></i></a>

							
							<form method="post" action="{{route('users.destroy',['id'=>$user->id])}}">
							@csrf
							<input type="hidden" value="DELETE" name="_method">
							<div id="modal-form{{$user->id}}" class="modal" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="blue bigger">Hapus data</h4>
										</div>
										<div class="modal-body">
											<p>Apa yakin menghapus data dengan nama <strong>{{$user->name}}</strong></p>
										</div>

										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal">
												<i class="ace-icon fa fa-times"></i>
												Cancel
											</button>

											<button class="btn btn-sm btn-danger">
												<i class="ace-icon fa fa-trash"></i>
												Hapus data
											</button>
										</div>
									</div>
								</div>
							</div><!-- PAGE CONTENT ENDS -->
							</form>

							</td>
							</tr>
							@endforeach
						</tbody>
					</table>
	
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
</script>
@endsection
