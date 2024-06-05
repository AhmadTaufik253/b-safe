@extends('admin.layouts.layout')
@section('menuDashboard','active')
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
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="width: 75%; margin: auto;">
										<canvas id="participantChart"></canvas>
									</div>
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
													<td>{{ $row->pelatihan->nama_pelatihan }}</td>
													<td>{{ $row->user->nama }}</td>
													<td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
													<td>
														<form action="{{ route('accept', $row->id) }}" method="GET">
															<button class="btn btn-success btn-sm">Accept</button>
														</form>
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

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var ctx = document.getElementById('participantChart').getContext('2d');
				var participantChart = new Chart(ctx, {
					type: 'line', // atau 'bar'
					data: {
						labels: @json($labels),
						datasets: [{
							label: 'Jumlah Peserta',
							data: @json($count),
							borderColor: 'rgba(75, 192, 192, 1)',
							backgroundColor: 'rgba(75, 192, 192, 0.2)',
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					}
				});
			});
		</script>
@endsection
	