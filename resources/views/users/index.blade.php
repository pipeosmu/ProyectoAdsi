@extends('layouts.app')
@section('title', 'Lista de Usuarios')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1 class="mt-2"><i class="fa fa-users"></i> Lista de Usuarios</h1>
				<hr>
				<a href="{{ url('users/create') }}" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Usuario
				</a>
				
				<br>
				<hr>

				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Correo Electrónico</th>
							<th>Teléfono</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody id="content">
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->first_name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone }}</td>

								<td>
									@if ($user->status == "1")
										<span class="btn btn-success"><i class="fa fa-check"></i></span>
									@else
										<span class="btn btn-danger"><i class="fa fa-times"></i></span>    
									@endif
								</td>

								<td>
									<a href="{{ url('users/'.$user->id )}}" class="btn btn-sm btn-custom">
										<i class="fa fa-search"></i>
									</a>

									<a href="{{ url('users/'.$user->id.'/edit/') }}" class="btn btn-sm btn-custom">
										<i class="fa fa-pen"></i>
									</a>

									<form action="{{ url('users/desactivar/'.$user->id) }}" method="post" style="display: inline-block;">
										@csrf
										@method('PUT')
										<button type="button" class="btn btn-sm btn-custom-danger btn-desactivar">
											<i class="fa fa-ban"></i>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
				{{ $users->links() }}
			</div>
		</div>
	</div>
	@include('menu.menu');
@endsection