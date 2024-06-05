@extends('admin.layouts.layout')
@section('menuPelatihan','active')
@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Pelatihan</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Pelatihan</h4>
										<button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fas fa-plus"></i> Buat Pelatihan
										</button>
									</div>
                                </div>
                                <div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th class="col-1">Cover</th>
													<th>Nama Pelatihan</th>
													<th>Harga</th>
													<th>Peserta</th>
													<th>Calon Peserta</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
													$no = 1;
												@endphp
												@foreach($pelatihan as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td class="text-center col-1">
														<div class="avatar avatar-xl">
															<img src="cover_pelatihan/{{ $row->cover }}" alt="..." class="avatar-img rounded">
														</div>
													</td>
													<td>{{ $row->nama_pelatihan }}</td>
													<td>{{ 'Rp. ' . number_format($row->harga, 0, ',', '.') }}</td>
													<td>{{ $row->jumlah_peserta }}</td>
													<td>{{ $row->jumlah_calon_peserta }}</td>
													<td>
                                                        <a href="#" data-toggle="modal" data-target="#editRowModal{{ $row->id }}"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('pelatihan-peserta',$row->id ) }}"><i class="fas fa-users"></i></a>
                                                        <a href="{{ route('pelatihan-calon-peserta',$row->id ) }}"><i class="fas fa-user-plus"></i></a>
                                                        <a href="{{ route('pelatihan-destroy', $row->id) }}"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>

		<!-- Modal Tambah Pelatihan -->
		<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Tambah Pelatihan</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="{{ route('pelatihan-store') }}" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<div class="form-group">
								<label for="">Cover</label>
								<input type="file" name="cover" class="form-control-file" id="">
							</div>
							<div class="form-group">
								<label>Nama Pelatihan</label>
								<input type="text" id="nama_pelatihan" name="nama_pelatihan" class="form-control" placeholder="" required>
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" id="harga" name="harga" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="modal-footer no-bd">
							<button type="submit" id="addRowButton" class="btn btn-primary">Save</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Edit Pelatihan -->
		@foreach($pelatihan as $row)
		<div class="modal fade" id="editRowModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Edit Pelatihan</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="{{ route('pelatihan-update', $row->id) }}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="modal-body">
							<div class="form-group">
								<div class="avatar avatar-xl">
									<img src="cover_pelatihan/{{ $row->cover }}" alt="..." class="avatar-img rounded">
								</div>
							</div>
							<div class="form-group">
								<label for="">Cover</label>
								<input type="file" name="cover"  class="form-control-file" id="">
							</div>
							<div class="form-group">
								<label>Nama Pelatihan</label>
								<input type="text" id="nama_pelatihan" value="{{ $row->nama_pelatihan }}" name="nama_pelatihan" class="form-control" placeholder="" required>
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" id="harga" value="{{ $row->harga }}" name="harga" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="modal-footer no-bd">
							<button type="submit" id="addRowButton" class="btn btn-primary">Save</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endforeach		
@endsection
	