
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>b-safe</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('asset/img/logo-2.png') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("assets/css/fonts.css") }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="blue">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.html" class="logo">
					{{-- <img src="{{ asset('assets/img/logoazzara.svg') }}" alt="navbar brand" class="navbar-brand"> --}}
					<h4 class="navbar-brand text-white">b-safe</h4>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{ Auth::user()->nama }}</h4>
											<p class="text-muted">{{ Auth::user()->email }}</p>
											{{-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> --}}
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									{{-- <a class="dropdown-item" href="#">My Profile</a>
									<a class="dropdown-item" href="#">My Balance</a>
									<a class="dropdown-item" href="#">Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Account Setting</a>
									<div class="dropdown-divider"></div> --}}
									<a class="dropdown-item" href="#" href="{{ route('logout') }}"
									onclick="event.preventDefault();
												  document.getElementById('logout-form').submit();">Logout</a>
												  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
													@csrf
												</form>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="" aria-expanded="true">
								<span>
									{{ Auth::user()->nama }}
									<span class="user-level">{{ Auth::user()->role }}</span>
									{{-- <span class="caret"></span> --}}
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					@php
						$pelatihan= App\Models\UserPelatihan::where('status_peserta','calon peserta')->count();
					@endphp
					<ul class="nav">
						<li class="nav-item @yield('menuDashboard')">
							<a href="/dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								@if($pelatihan > 0)
								<span class="badge badge-count">{{ $pelatihan }}</span>
								@endif
							</a>
						</li>
						<li class="nav-item @yield('menuMember')">
							<a href="/member">
								<i class="fas fa-users"></i>
								<p>Member</p>
							</a>
						</li>
						<li class="nav-item @yield('menuPelatihan')">
							<a href="/pelatihan">
								<i class="fas fa-chalkboard-teacher"></i>
								<p>Pelatihan</p>
							</a>
						</li>
						<li class="nav-item @yield('menuProyek')">
							<a href="/proyek">
								<i class="fas fa-file-contract"></i>
								<p>Proyek</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->


        <!-- Main Panel -->
        @yield('content')
        	
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeMainHeaderColor" data-color="blue"></button>
							<button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
							<button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeMainHeaderColor" data-color="green"></button>
							<button type="button" class="changeMainHeaderColor" data-color="orange"></button>
							<button type="button" class="changeMainHeaderColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
</div>
 <!-- Core JS Files -->
 <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
 <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
 <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

 <!-- jQuery UI -->
 <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

 <!-- jQuery Scrollbar -->
 <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

 <!-- Moment JS -->
 <script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

 <!-- Chart JS -->
 <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

 <!-- jQuery Sparkline -->
 <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

 <!-- Chart Circle -->
 <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

 <!-- Datatables -->
 <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

 <!-- Bootstrap Toggle -->
 <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

 <!-- jQuery Vector Maps -->
 <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

 <!-- Google Maps Plugin -->
 <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

 <!-- Sweet Alert -->
 <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

 <!-- Azzara JS -->
 <script src="{{ asset('assets/js/ready.min.js') }}"></script>

 <!-- Azzara DEMO methods, don't include it in your project! -->
 <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
 <script src="{{ asset('assets/js/demo.js') }}"></script>

<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>

@if(session('success'))
	<script>
		var SweetAlert2Demo = function(){
			var initDemos = function(){
				swal({
					title:"Success",
					text:"{{session('success')}}",
					icon : "success",
					buttons : {
						confirm: {
							text : "OK",
							value : true,
							visible : true,
							className : "btn btn-success",
							closeModal : true
						}
					}
				});
			};
			return {
				init: function(){
					initDemos();
				},
			};
		}();
		jQuery(document).ready(function(){
			SweetAlert2Demo.init();
		});
	</script>
@endif

</body>
</html>