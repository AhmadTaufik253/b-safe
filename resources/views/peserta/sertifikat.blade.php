@extends('peserta.layouts.layout')
@section('menuSertifikat','active')
@section('content')

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Sertifikat</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Sertifikat</h4>
                                </div>
                                <div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Pelatihan</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach($sertif as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $row->pelatihan->nama_pelatihan }}</td>
													<td>
                                                        <a href="{{ asset($row->sertifikat) }}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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
@endsection
	