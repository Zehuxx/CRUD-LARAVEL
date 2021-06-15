@extends('layouts.usuarios_admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Usuarios</h1>
				</div> 
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
						<li class="breadcrumb-item active">Usuarios</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="card card-primary collapsed-card">
							<div class="card-header" data-card-widget="collapse" style="cursor: pointer;background-color: #227f43c2;">
								<h3 class="card-title">Filtros</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" ><i class="fas fa-plus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body" style="display: none;">
								<div class="row">
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroNombres">Nombre</label>
										<input type="text" class="form-control" id="filtroNombres" placeholder="Nombre">
									</div>
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroRol">Rol</label>
										<input type="text" class="form-control" id="filtroRol" placeholder="Rol">
									</div>
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroEmail">Email</label>
										<input type="text" class="form-control" id="filtroEmail" placeholder="Email">
									</div>
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroTelefono">Teléfono</label>
										<input type="text" class="form-control" id="filtroTelefono" placeholder="Teléfono">
									</div>
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroCedula">Cedula</label>
										<input type="text" class="form-control" id="filtroCedula" placeholder="Cedula">
									</div>
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroFechaN">Fecha de nacimiento</label>
										<input type="text" class="form-control" id="filtroFechaN" placeholder="Fecha de nacimiento">
									</div>
									<div class="col-lg-3 col-sm-4 col-md-4 form-group">
										<label for="filtroResidencia">Ciudad de residencia</label>
										<input type="text" class="form-control" id="filtroResidencia" placeholder="Ciudad de residencia">
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>

						<div class="table-responsive">
							<table id="tableUsuariosAdmin" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<th>Nombre</th>
										<th>Rol</th>
										<th>Email</th>
										<th>Teléfono</th>
										<th>Cedula</th>
										<th>Fecha de nacimiento</th>
										<th>C. de residencia</th>
										<th></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection

@section('js')
@parent {{-- usado para no sobrescibir lo que esta en layouts.usuarios --}}
<script type="text/javascript">
	var urlTableUsuarios = '{{ route('datatable usuarios admin') }}';
	var rutaNuevoUsuario = '{{route('nuevo usuario admin')}}';
	var rutaEditarUsuario = '{{route('editar usuario admin',':id')}}';
	var rutaBorrarUsuario = '{{route('borrar usuario admin',':id')}}';
	var rutaRestaurarUsuario = '{{route('restaurar usuario admin')}}';
	@if(session('status'))
	toastr.success('{{ session('status') }}');
	@endif

</script>
<script src="{{ asset('js/admin/usuarios.js')}}"></script>
@endsection