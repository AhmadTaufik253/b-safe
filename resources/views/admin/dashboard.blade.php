@extends('admin.layouts.layout')
@section('content')

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Pertumbuhan Peserta</div>
										{{-- <div class="card-tools">
											<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>
											<a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div> --}}
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="min-height: 375px">
										<canvas id="statisticsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
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
													<th>Pelatihan</th>
													<th>Nama Peserta</th>
													<th>Tanggal pendaftaran</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach($calon as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $row->pelatihan }}</td>
													<td>{{ $row->nama }}</td>
													<td>10 Oktober 2023 10.10</td>
													<td>
                                                        <button class="btn btn-success btn-sm">Detail</button>
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
	