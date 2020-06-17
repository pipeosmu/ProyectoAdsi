@extends('layouts.app')
@section('title', 'Crear Categoria')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('categories') }}">
								<i class="fa fa-list"></i>
					    		Lista Categorías
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-plus"></i>
					    	Adicionar Categoría
					    </li>
					</ol>
				</nav>
				<hr>
				<h1 class="mt-2"><i class="fa fa-plus"></i> Adicionar Categoría</h1>
				<hr>
				
				<form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
					@csrf
			
					<div class="form-group">
						<label for="name_category">Nombre</label>
						<input type="text" name="name_category" class="form-control @error('name_category') is-invalid @enderror" value="">

						@error('name_category')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					
					<div class="form-group">
						<button class="btn btn-block btn-custom btn-upload" type="button">
							<i class="fa fa-upload"></i>
							Seleccionar Imágen
						</button>
						<input type="file" name="image" id="photo" class="d-none" accept="image/*">
						<br>
						<div class="text-center @error('image') is-invalid @enderror">
							<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-image.png') }}" width="120px">
						</div>

						@error('image')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-custom">
							<i class="fa fa-save"></i>
							Guardar
						</button>
						<button type="reset" class="btn btn-dark">
							<i class="fa fa-eraser"></i>
							Limpiar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection