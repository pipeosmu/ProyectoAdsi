@extends('layouts.app')
@section('title', 'Adicionar Usuario')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('users') }}">
								<i class="fa fa-users"></i>
					    		Lista Usuarios
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-plus"></i>
					    	Adicionar Usuario
					    </li>
					</ol>
				</nav>
				<hr>
				<h1 class="mt-2"><i class="fa fa-plus"></i> Adicionar Usuario</h1>
				<hr>

				<div>
					<ul id="progressbar" class="text-center">
			            <li id="progress-opt1" class="active">Informacion Usuario</li>
			            <li id="progress-opt2" class="">Direccion</li>
            		</ul>
  					{{-- ********************************************************************************************************* --}}
					<form method="post" enctype="multipart/form-data" id="form-user"  class="animate__animated animate__fadeIn">

						@csrf
						<div class="form-row">
						    <div class="form-group col-md-12">
						      	<label for="identification_user">Cédula Ciudadanía</label>
						      	<input type="text" name="identification_user" class="form-control" id="identification-user" required>
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="first_name">Primer Nombre</label>
						      	<input type="text" name="first_name" class="form-control" id="first_name" required>
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="second_name">Segundo Nombre</label>
						      	<input type="text" name="second_name" class="form-control" id="second_name">
						    </div>
						 </div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="first_lastname">Primer Apellido</label>
						      	<input type="text" name="first_lastname" class="form-control" id="first_lastname" required>
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="second_lastname">Segundo Apellido</label>
						      	<input type="text" name="second_lastname" class="form-control" id="second_lastname" required>
						    </div>
						 </div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
						      	<label for="birthdate">Fecha Nacimiento</label>
						      	<input type="date" name="birthdate" class="form-control" id="birthdate" required>
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="email">Correo Electrónico</label>
						      	<input type="email" name="email" class="form-control" id="email" required>
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="phone">Teléfono</label>
								<input type="number" name="phone" class="form-control" id="phone" required>
							</div>

						   	<div class="form-group col-md-6">
								<label for="gender">Género</label>
								<select name="gender" class="form-control" id="gender" required>
									<option value="">Seleccione...</option>
									<option value="Masculino" @if(old('gender')=='Masculino') selected @endif>Masculino</option>
									<option value="Femenino" @if(old('gender')=='Femenino') selected @endif>Femenino</option>
								</select>
							</div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						   	<div class="form-group col-md-6">
								<label for="civil_status">Estado Civil</label>
								<select name="civil_status" class="form-control" id="civil_status" required>
									<option value="">Seleccione...</option>
									<option value="Soltero" @if(old('civil_status')=='Soltero') selected @endif>Soltero</option>
									<option value="Casado" @if(old('civil_status')=='Casado') selected @endif>Casado</option>
									<option value="Otro" @if(old('civil_status')=='Otro') selected @endif>Otro</option>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="role">Tipo Usuario</label>
								<select name="role" class="form-control" id="role" required>
									<option value="">Seleccione...</option>
									<option value="Admin" @if(old('role')=='Admin') selected @endif>Administrador</option>
									<option value="Cliente" @if(old('role')=='Cliente') selected @endif>Cliente</option>
									<option value="Tecnico" @if(old('role')=='Tecnico') selected @endif>Técnico</option>
								</select>
							</div>
						</div>
						
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="password">Contraseña</label>
								<input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Contraseña" id="password" required>
							</div>

							<div class="form-group col-md-6">
								<label for="password_confirmation">Confirmar Contraseña</label>
								<input type="password" name="password_confirmation" class="form-control" value="{{ old('password') }}" placeholder="Confirmar Contraseña" id="password_confirmation" required>
							</div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-group">
							<button type="submit" class="btn btn-custom" id="btn-add-user">
								<i class="fa fa-save"></i>
								Guardar
							</button>
							<button type="reset" class="btn btn-dark">
								<i class="fa fa-eraser"></i>
								Limpiar
							</button>
						</div>
					</form>

					{{-- ********************************************************************************************************* --}}
					{{-- ********************************************************************************************************* --}}

					<form action="{{ url('addresses') }}" method="post" enctype="multipart/form-data" id="form-address" style="display: none;"  class="animate__animated animate__fadeInLeft">
						@csrf
						<div class="form-row">
						    <div class="form-group col-md-12">
						      	<input type="hidden" name="fk_user" class="form-control" id="id-user">
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-12">
						      	<label for="address">Dirección</label>
						      	<input type="text" name="address" class="form-control @error('address') is-invalid @enderror">

						      	@error('address')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-12">
						      	<label for="neighborhood">Barrio</label>
						      	<input type="text" name="neighborhood" class="form-control @error('neighborhood') is-invalid @enderror">

						      	@error('neighborhood')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-group">
							<label for="departments">Departamentos</label>
							<select name="departments" class="form-control" id="select_departments">
								<option value="">Seleccione Departamento...</option>
							</select>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-group">
							<label for="fk_municipality">Municipios</label>
							<select name="fk_municipality" id="select_municipalities" class="form-control">
								<option value="">Seleccione Municipio...</option>
							</select>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-group">
							<button type="submit" class="btn btn-custom" id="btn-add-user">
								<i class="fa fa-save"></i>
								Guardar
							</button>
							<button type="reset" class="btn btn-dark">
								<i class="fa fa-eraser"></i>
								Limpiar
							</button>
						</div>
					</form>
					{{-- ********************************************************************************************************* --}}
					{{-- ********************************************************************************************************* --}}
					<form action="{{ url('users') }}" style="display: none;" id="form-omitir">
						<button type="button" class="btn btn-danger" id="btn-omitir">
					    	Omitir
					    </button>
					</form>
					{{-- ********************************************************************************************************* --}}
				</div>
			</div>
		</div>
	</div>
	
	@include('menu.menu');
@endsection