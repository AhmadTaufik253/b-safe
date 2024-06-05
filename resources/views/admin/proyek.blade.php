@extends('admin.layouts.layout')
@section('menuProyek','active')
@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Proyek</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List Proyek</h4>
                                </div>
                                <div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Peserta</th>
													<th>Pelatihan</th>
													<th>Tanggal Pendaftaran</th>
													<th>Status Bayar</th>
													<th>Status Sertifikat</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
													$no = 1;	
												@endphp
												@foreach($peserta as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $row->user->nama }}</td>
													<td>{{ $row->pelatihan->nama_pelatihan }}</td>
													<td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
                                                    <td>
														@if($row->status_bayar == null)
															<span class="badge badge-danger">DP</span>
														@else	
															<span class="badge badge-success">{{ $row->status_bayar }}</span>
														@endif
													</td>
                                                    <td>
														@if($row->status_sertifikat == null)
															<a href="{{ route('kirim-sertifikat', $row->id) }}" class="btn btn-info btn-sm">Proses</a>
														@else	
															Sertifikat sudah dibuat
														@endif														
													</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#uploadModal{{ $row->id }}"><i class="fas fa-dollar-sign"></i></a>
                                                        <a href="#"><i class="fas fa-file-alt"></i></a>
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

		<!-- Modal Upload Bukti Bayar -->
		@foreach($peserta as $row)
		<div class="modal fade" id="uploadModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">Upload Bukti Pembayaran</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="{{ route('upload-pembayaran', $row->id) }}" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<div class="form-group">
								<label for="">Bukti Pembayaran</label>
								<input type="file" name="bukti_pembayaran"  class="form-control-file" id="">
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
	