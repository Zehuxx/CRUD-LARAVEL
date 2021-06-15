@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-select/css/select.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/magicsuggest/magicsuggest.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/portal.css')}}">
@endsection

@section('body')
	<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
	<!-- Site wrapper -->
	<div class="wrapper"> 
  	<!-- Navbar -->
  	<nav class="main-header navbar navbar-expand navbar-cyan navbar-dark">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<!-- Messages Dropdown Menu -->
			<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<img src="{{asset('dist/img/default-photo.png')}}" class="user-image img-circle elevation-2" alt="User Image">
				<span class="d-none d-md-inline">{{Auth::user()->nombre}}</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="{{asset('dist/img/default-photo.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								<strong>{{Auth::user()->nombre}}</strong>
								<span class="float-right text-sm text-success"><i class="fas fa-circle"></i></span>
							</h3>
							<p class="text-sm">{{Auth::user()->email}}</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
			<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">
					<span class="float-right text-sm"><i class="fas fa-user-edit"></i></span>
					Editar perfil
				</a> 
				<div class="dropdown-divider"></div>
					<a href="{{route("logoutt")}}" class="dropdown-item dropdown-footer">
						<span class="float-right text-md"><i class="fas fa-sign-out-alt"></i></span>
						Cerrar sesión
					</a>
			</div>
			</li>
		</ul>
	</nav>
  	<!-- /.navbar -->

  	<!-- Main Sidebar Container -->
	  <aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="{{route("home")}}" class="brand-link navbar-cyan">
			<img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3">
			<span class="brand-text font-weight-light">Claro insurance crud</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">

			<!-- Sidebar Menu -->
			
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
    <!-- /.sidebar -->

  	<!-- Content Wrapper. Contains page content -->
  	@yield('content')
  	<!-- /.content-wrapper -->

  	<footer class="main-footer">
    	<div class="float-right d-none d-sm-block">
      		<b>Version</b> 1.0
    	</div>
    	<strong>Copyright &copy; 2021 <a href="#">Juan Soler</a>.</strong> All rights reserved.
  	</footer>
</div>
<!-- ./wrapper -->

@endsection
@section('js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-select/js/dataTables.select.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap-datepicker.es.min.js')}}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('plugins/magicsuggest/magicsuggest.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('js/controlcliks.js')}}"></script>
<script type="text/javascript">
 var dtSpanishJsonUrl = '{{asset('plugins/datatables/Spanish.json')}}';
</script>
@endsection
