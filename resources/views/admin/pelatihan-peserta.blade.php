@extends('admin.layouts.layout')
@section('menuPelatihan','active')
@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Peserta Pelatihan</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Peserta Pelatihan {{ $nama_pelatihan }}</h4>
									</div>
                                </div>
                                <div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Peserta</th>
													<th>Email</th>
													<th>Nomor Telepon</th>
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
													<td>{{ $row->user->email }}</td>
													<td>{{ $row->user->no_telepon }}</td>
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
@endsection
	