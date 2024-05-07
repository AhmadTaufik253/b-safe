@extends('admin.layouts.layout')
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
                                    <h4 class="card-title">Calon Peserta</h4>
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
												<tr>
													<td>1</td>
													<td></td>
                                                    <td>Nanda Jati Sampurna</td>
													<td>NandaJatiSampurna@gmail.com</td>
                                                    <td><span class="badge badge-success">Success</span></td>
													<td>10 Oktober 2023 10.10</td>
													<td>
                                                        <a href="#"><i class="fas fa-edit"></i></a>
                                                        <a href="#"><i class="fas fa-redo"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                                                        <a href="#"><i class="fas fa-folder-open"></i></a>
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
	