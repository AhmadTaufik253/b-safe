@extends('admin.layouts.layout')
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
                                    <h4 class="card-title">Proyek</h4>
                                </div>
                                <div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Perusahaan</th>
													<th>Proyek</th>
													<th>Tgl Pengajuan</th>
													<th>Status Bayar</th>
													<th>Status Sertifikat</th>
													<th>Status SKL</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>PT. Maju Bersama</td>
													<td>Sertifikat ISO 9001:2005</td>
													<td>10 Oktober 2023 10.10</td>
                                                    <td><span class="badge badge-danger">DP</span></td>
                                                    <td><span class="badge badge-info">Proses</span></td>
                                                    <td><span class="badge badge-info">Proses</span></td>
                                                    <td>
                                                        <a href="#"><i class="fas fa-dollar-sign"></i></a>
                                                        <a href="#"><i class="fas fa-file-alt"></i></a>
                                                    </td>
												</tr>
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
	