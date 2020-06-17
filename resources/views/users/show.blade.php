@extends('layouts.app')
@section('title', 'Consultar Usuario')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-7 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('users') }}">
								<i class="fa fa-users"></i>
					    		Lista Usuarios
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-search"></i>
					    	Consultar Usuario
					    </li>
					</ol>
				</nav>

				<hr>
				<h1 class="mt-2"><i class="fa fa-search"></i> Consultar Usuario</h1>
				<hr>
				<br>

				<table class="table table-striped">
					<tr>
						<td colspan="2" class="text-center">
							<img class="rounded-circle img-thumbnail" src="{{ asset($user->photo) }}" style="width: 14rem; height: 14rem;">
						</td>
					</tr>
					
					<tr>
						<th>Identificación: </th>
						<td>{{ $user->identification_user }}</td>
					</tr>

					<tr>
						<th>Nombre: </th>
						<td>{{ $user->first_name }} {{$user->first_lastname}}</td>
					</tr>

					<tr>  
						<th>Correo Electrónico: </th>
						<td>{{ $user->email }}</td>
					</tr>

					<tr>
						<th>Teléfono: </th>
						<td>{{ $user->phone }}</td>
					</tr>

					<tr>
						<th>Fecha de Nacimiento:</th>
						<td>
							{{ $user->birthdate }}
							{{-- &nbsp; | &nbsp;
							@php use \Carbon\Carbon; @endphp
							{{ Carbon::createFromDate($user->birthdate)->diff(Carbon::now())->format('%y años, %m meses y %d días') }} --}}
						</td>
					</tr>

					<tr>
						<th>Estado Civil: </th>
						<td>{{ $user->civil_status }}</td>
					</tr>

					<tr>
						<th>Genero:</th>
						<td>
							@if ($user->gender == "Female")
							Mujer
							@else
							Hombre    
							@endif
						</td>
					</tr>

					<tr>
						<th>Role: </th>
						<td>{{ $user->role }}</td>
					</tr>

					<tr>
						<th>Estado:</th>
						<td>
							@if ($user->status == "1")
								<span class="btn btn-success">Activo</span>
							@else
								<span class="btn btn-danger">Inactivo</span>    
							@endif
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>	
@endsection