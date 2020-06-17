@extends('layouts.app')
@section('title', 'Escritorio - Administrador')


@section('content')
<div class="container">
    <div class="row justify-content-center color-container">
        <a class="col-md-5 space-bottom" href="{{url('users')}}">
            <div class="card">
                <div class="card-header">
                	 <div class="card card-animate">
                	 	<div class="card-header icon-menu">
                	 		<i class="fa fa-users"></i>
                	 	</div>
                	 	<div class="card-body text-body">
						    Módulo Usuarios
						</div>
                	 </div>
                </div>
            </div>
        </a>
        

        <a class="col-md-5 space-bottom" href="{{url('categories')}}">
            <div class="card">
                <div class="card-header">
                	 <div class="card card-animate">
                	 	<div class="card-header icon-menu">
                	 		<i class="fa fa-columns"></i>
                	 	</div>
                	 	<div class="card-body text-body">
						    Módulo Categorías
						</div>
                	 </div>
                </div>
            </div>
        </a>

        <a class="col-md-5">
            <div class="card">
                <div class="card-header">
                	 <div class="card card-animate">
                	 	<div class="card-header icon-menu">
                	 		<i class="fa fa-list"></i>
                	 	</div>
                	 	<div class="card-body text-body">
						    Módulo Servicios
						</div>
                	 </div>
                </div>
            </div>
        </a>

        <a class="col-md-5">
            <div class="card">
                <div class="card-header">
                	 <div class="card card-animate">
                	 	<div class="card-header icon-menu">
                	 		<i class="fa fa-business-time"></i>
                	 	</div>
                	 	<div class="card-body text-body">
						    Módulo Pedidos
						</div>
                	 </div>
                </div>
            </div>
        </a>
    </div>
</div>
@include('menu.menu');
@endsection
