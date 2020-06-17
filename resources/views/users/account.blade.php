@extends('layouts.app')
@section('title', 'Mi Cuenta')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-account animate__animated animate__fadeIn">
            	 <div class="card-header header-image">
            	 	<a class="photo-account" data-toggle="modal" data-target="#exampleModal" href="#exampleModal">
                      <img class="img-thumbnail photo-size" src="{{ asset(Auth::user()->photo) }}" width="130px" height="170px">
                      <i class="fa fa-camera icon-camera"></i>
                    </a>
            	 </div>
            	 <div class="card-body body-account">
            	 	<h2 class="h2-account"><i class="fas fa-users-cog"></i> Mis Datos</h2>
            	 	<button type="button" class="btn btn-dark btn-edit" id="btn-edit-1">Editar</button>
            	 	<button type="button" class="btn btn-danger btn-cancel" id="btn-cancel-1">Cancelar</button>
            	 	<button type="button" class="btn btn-success btn-confirm" id="btn-confirm-1">Confirmar</button>
            	 	<form class="form-account">
        	 		 <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputFirstName">Primer Nombre</label>
					      <input class="form-control input-form" id="inputFirstName" type="text" value="{{Auth::user()->first_name}}" readonly>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputFirstLastName">Primer Apellido</label>
					      <input class="form-control input-form" id="inputFirstLastName" type="text" value="{{Auth::user()->first_lastname}}" readonly>
					    </div>
					 </div>
					 <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputSecondName">Segundo Nombre</label>
					      <input class="form-control input-form" id="inputSecondName" type="text" value="{{Auth::user()->second_name}}" readonly>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputSecondLastName">Segundo Apellido</label>
					      <input class="form-control input-form" id="inputSecondLastName" type="text" value="{{Auth::user()->second_lastname}}" readonly>
					    </div>
					 </div>

					 <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="inputBirthdate">Fecha Nacimiento</label>
					      <input class="form-control" id="inputBirthdate" type="text" value="{{Auth::user()->birthdate}}" readonly>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputEmail">Correo Electronico</label>
					      <input class="form-control input-form" id="inputEmail" type="text" value="{{Auth::user()->email}}" readonly>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputPhone">Telefono</label>
					      <input class="form-control input-form" id="inputPhone" type="text" value="{{Auth::user()->phone}}" readonly>
					    </div>
					 </div>
					 <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="inputCivilStatus">Estado Civil</label>
					      <input class="form-control input-form" id="inputCivilStatus" type="text" value="{{Auth::user()->civil_status}}" readonly>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputGender">Genero</label>
					      <input class="form-control" id="inputGender" type="text" value="{{Auth::user()->gender}}" readonly>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputRol">Tipo Usuario</label>
					      <input class="form-control" id="inputRol" type="text" value="{{Auth::user()->role}}" readonly>
					    </div>
					 </div>
            	 	</form>
            	 </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Imágen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('update-photo') }}" method="post" enctype="multipart/form-data">
		    @csrf
			@method('PUT')				
			<div class="form-group">
				<div class="text-center @error('photo') is-invalid @enderror">
					<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-photo.png') }}" width="120px">
				</div>
                <br>
				<button class="btn btn-block btn-custom btn-upload" type="button">
					<i class="fa fa-upload"></i>
					Seleccionar Imágen
				</button>
				<input type="file" name="photo" id="photo" class="d-none" accept="image/*">

				@error('photo')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-dark">Guardar</button>
      </div>
		</form>
      </div>
      
    </div>
  </div>
</div>

@include('menu.menu');
@endsection