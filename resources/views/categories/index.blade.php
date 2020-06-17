@extends('layouts.app')
@section('title', 'Lista de Categorias')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1 class="mt-2"><i class="fa fa-list"></i> Lista de Categorías</h1>
				<hr>
				<a href="{{ url('categories/create') }}" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Categoría
				</a>
				
				<br>
				<hr>

				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Fecha Creación</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody id="content">
						@foreach ($cats as $cat)
							<tr>
								<td>{{ $cat->name_category }}</td>
								
								<td>
									{{ $cat->created_at }}
								</td>

								<td>
									<a href="#consultar" class="btn btn-sm btn-custom btn-consultar" data-id="{{ $cat->id }}"
										data-table="Category" data-toggle="modal" data-target="#consultar">
										<i class="fa fa-search"></i>
									</a>

									<a href="{{ url('categories/'.$cat->id.'/edit/') }}" class="btn btn-sm btn-custom">
										<i class="fa fa-pen"></i>
									</a>

									<form action="{{ url('categories/'.$cat->id) }}" method="post" style="display: inline-block;">
										@csrf
										@method('delete')
										<button type="button" class="btn btn-sm btn-custom-danger btn-delete">
											<i class="fa fa-trash"></i>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
				{{ $cats->links() }}
			</div>
		</div>
	</div>
	<div class="modal fade" id="consultar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Consultar Categoría</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" id="modalCategory">
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-dark" data-dismiss="modal">Volver</button>
	      </div>
	    </div>
	  </div>
	</div>

    @include('menu.menu');
<!-- container -->
@endsection