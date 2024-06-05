@extends('admin.layouts.layout')
@section('menuMember','active')
@section('content')

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Member</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Peserta</h4>
                                </div>
                                <div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Foto</th>
													<th>Nama Peserta</th>
													<th>Kontak</th>
													<th>Status Peserta</th>
													<th>Terdaftar</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
													$no = 1;
												@endphp
												@foreach($member as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td class="text-center col-1">
														<div class="avatar avatar-xl">
															@if($row->user->foto_background_merah != null)
																<img src="{{ asset('storage/' . $row->user->foto_background_merah) }}" alt="..." class="avatar-img rounded">
															@else
																<img src="https://placehold.co/800?text=Image" alt="..." class="avatar-img rounded">
															@endif
														</div>
													</td>
                                                    <td>{{ $row->user->nama }}</td>
													<td>{{ $row->user->email }}</td>
                                                    <td><span class="badge badge-success">{{ $row->user->tipe_pendaftaran }}</span></td>
													<td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
													<td>
                                                        <a href="{{ route('member-edit', $row->user->id) }}"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('member-riwayat', $row->user->id) }}"><i class="fas fa-redo"></i></a>
                                                        <a href="{{ route('member-dokumen', $row->user->id) }}"><i class="fas fa-folder-open"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $row->id }}"><i class="fas fa-trash-alt"></i></a>
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

		<!-- modal -->
		@foreach($member as $row)
		<div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">Hapus Data Kelas</span> 
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form method="POST" action="{{ route('member-delete', $row->id) }}" >
						@csrf
                        @method('DELETE')
						<div class="modal-body">
							<input type="hidden" value="{{$row->id}}" name="id" required>

							<div class="form-group">
								<h4>Apakah Anda Ingin Menghapus Data ini?</h4>
							</div>
						</div>
						<div class="modal-footer no-bd">
							<button type="submit" id="delete" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
                </div>
            </div>
        </div>
		@endforeach

@endsection
	