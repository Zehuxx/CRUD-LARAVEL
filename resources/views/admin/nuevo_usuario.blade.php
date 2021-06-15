@extends('layouts.usuarios_admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Nuevo usuario</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{route('usuarios admin')}}">Usuarios</a></li>
						<li class="breadcrumb-item active">Nuevo usuario</li>
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
					<form class="well form-horizontal" method="post" action="{{route('guardar usuario admin')}}">
						@csrf
						<div class="card-body" style="width: 80%;margin: 0 auto;">
							<div class="row">
								<div class="col-12 form-group">
									<label for="nombre">Nombre Completo</label>
									<input type="text" class="form-control  @error('nombre') is-invalid @enderror" required value="{{ old('nombre') }}" id="nombre" name="nombre" placeholder="Nombre Completo">
									@error('nombre')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('nombre') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="cedula">Cedula</label>
									<input type="text" class="form-control  @error('cedula') is-invalid @enderror" required value="{{ old('cedula') }}" id="cedula" name="cedula" placeholder="Cedula">
									@error('cedula')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('cedula') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="telefono">Teléfono </label>
									<input type="text" class="form-control @error('telefono') is-invalid @enderror"  required value="{{ old('telefono') }}" id="telefono" name="telefono" placeholder="Teléfono">
									@error('telefono')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('telefono') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control @error('email') is-invalid @enderror" required  value="{{ old('email') }}" id="email" name="email" placeholder="Email">
									@error('email')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="pais">País</label>
									<select class="form-control @error('pais') is-invalid @enderror" data-dependent="estado" id="pais" name="pais">
										<option value="">Seleccione el país</option>
										@foreach($paises as $pais)
										<option value="{{$pais->id}}" {{ old('pais') == $pais->id ? 'selected' : ''  }}>{{$pais->nombre}}</option>
										@endforeach 
									</select>
									@error('pais')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('pais') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="estado">Estado</label>
									<select class="form-control @error('estado') is-invalid @enderror" data-dependent="ciudad" id="estado" name="estado">
										<option value="">Seleccione el estado</option>
										@foreach($estados as $estado)
										<option value="{{$estado->id}}" {{ old('estado') == $estado->id ? 'selected' : ''  }}>{{$estado->nombre}}</option>
										@endforeach 
									</select>
									@error('estado')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('estado') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="ciudad">Ciudad</label>
									<select class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad">
										<option value="">Seleccione la ciudad</option>
										@foreach($ciudades as $ciudad)
										<option value="{{$ciudad->id}}" {{ old('ciudad') == $ciudad->id ? 'selected' : ''  }}>{{$ciudad->nombre}}</option>
										@endforeach 
									</select>
									@error('ciudad')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('ciudad') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group" id="dFecNacimiento">
									<label for="fecha_nacimiento">Fecha de nacimiento: </label>
									<div class="input-group date" >
										<input type="text" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento') }}" placeholder="yyyy-mm-dd" id="fecha_nacimiento" name="fecha_nacimiento">
										<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
									</div>
									@error('fecha_nacimiento')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('fecha_nacimiento') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="password">Contraseña</label>
									<input type="password" class="form-control @error('password') is-invalid @enderror" required id="password" name="password" placeholder="Contraseña">
									@error('password')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<label for="password-confirm">Confirmar contraseña</label>
									<input type="password" class="form-control @error('password-confirm') is-invalid @enderror" required id="password-confirm" name="password-confirm" placeholder="Confirmar contraseña">
									@error('password-confirm')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $errors->first('password-confirm') }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-12 form-group">
									<button class="btn btn-sm btn-primary" onclick="submitForm(this);" type="submit">
										<i class="fa fa-save"></i> Guardar</button>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- /.modal -->
	@endsection

	@section('js')
	@parent {{-- usado para no sobrescibir lo que esta en layouts.usuarios --}}
	<script type="text/javascript">
		var urlEstadosFetch = '{{ route('estados fetch') }}'; 
		var urlCiudadesFetch = '{{ route('ciudades fetch') }}'; 
	</script>
	<script src="{{ asset('js/admin/nuevoUsuario.js')}}"></script>
	

	@endsection

