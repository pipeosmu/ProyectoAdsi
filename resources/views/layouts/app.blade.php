<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-custom shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">
                                <i class="fa fa-home"></i>
                                Inicio
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-lock"></i>
                                    {{ __('custom.login') }}
                                </a>
                            </li>
                            <li class="nav-item"><span class="nav-link">|</span></li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa fa-user"></i>
                                        {{ __('custom.register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name.' '.Auth::user()->first_lastname }} <span class="caret"></span>
                                    <img class="rounded-circle" src="{{ asset(Auth::user()->photo) }}" width="30" height="30">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role == "Admin")
                                        <a class="dropdown-item" href="{{ url('account') }}">
                                            <i class="fa fa-user"></i> 
                                            Mi perfil
                                        </a>
                                        <a class="dropdown-item" href="{{ url('users') }}">
                                            <i class="fa fa-users"></i> 
                                            Módulo Usuarios
                                        </a>
                                        <a class="dropdown-item" href="{{ url('categories') }}">
                                            <i class="fa fa-columns"></i> 
                                            Módulo Categorías
                                        </a>
                                        <a class="dropdown-item" href="{{ url('services') }}">
                                            <i class="fa fa-list"></i> 
                                            Módulo Servicios
                                        </a>
                                        <a class="dropdown-item" href="{{ url('orders') }}">
                                            <i class="fa fa-business-time"></i> 
                                            Módulo Pedidos
                                        </a>
                                    @elseif (Auth::user()->role == "Customer")
                                        <a class="dropdown-item" href="{{ url('account') }}">
                                            <i class="fa fa-user"></i> 
                                            Mi perfil
                                        </a>
                                        <a class="dropdown-item" href="{{ url('orders') }}">
                                            <i class="fa fa-business-time"></i> 
                                            Mis Pedidos
                                        </a>
                                    @endif

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-times"></i>
                                        {{ __('custom.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function(event){
                Swal.fire({
                    title: 'Está usted seguro?',
                    text: "Desea eliminar este registro?",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#00796b',
                    cancelButtonColor: '#c20031',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $(this).parent().submit();
                    }
                });
            });
            
            /* ----------------------------------------------------------------------------- */

            @if(session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonColor: '#00796b',
                });
            @endif

            /* ----------------------------------------------------------------------------- */

            $('.btn-upload').click(function(event){
                $('#photo').click();
            });


            $('#photo').change(function(event){
                var fileName = event.target.files[0].name;
                
                var reader = new FileReader();
                reader.onload = function(event){
                    $('#preview').attr('src', event.target.result)
                };
                reader.readAsDataURL(this.files[0]);
            });

            /* ----------------------------------------------------------------------------- */

            $('.btn-consultar').click(function(event) {
                $id = $(this).attr('data-id');
                $table = $(this).attr('data-table');
                // alert($table);
                $.get('show'+$table ,{id:$id},function(data){
                    $("#modal"+$table).html(data);
                });          
            });

            /* ----------------------------------------------------------------------------- */

            let btnEdit = $('#btn-edit-1');
            let btnCancel = $('#btn-cancel-1');
            let btnConfirm = $('#btn-confirm-1');
            let inputs = $('.input-form');

            btnEdit.click((event)=>{
                btnEdit.css("display","none");
                btnConfirm.css("display","inline-block");
                btnCancel.css("display", "inline-block");
                inputs.removeAttr('readonly');
            });

            btnConfirm.click((event)=>{
                btnEdit.css("display","inline-block");
                btnConfirm.css("display","none");
                btnCancel.css("display", "none");
                inputs.attr('readonly','1');
            });

            btnCancel.click((event)=>{
                btnEdit.css("display","inline-block");
                btnConfirm.css("display","none");
                btnCancel.css("display", "none");
                inputs.attr('readonly','1');
            });

           /* ----------------------------------------------------------------------------- */
           
            let formUser = $('#form-user');
            let formAdress = $('#form-address');
            let formOmitir = $('#form-omitir');
            let opt2 = $('#progress-opt2');
            let identificationUser = $('#identification-user'); 
            let idUser = $('#id-user');
            let password = $('#password');
            let passwordConfirmation = $('#password_confirmation');

            $('#form-user').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '/users',
                    data: $('#form-user').serialize(),
                    success: function (id) {
                        Swal.fire({
                            title: 'Felicitaciones',
                            text: `Usuario Creado Exitosamente`,
                            icon: 'success',
                            confirmButtonColor: '#00796b',   
                        });

                        console.log(identificationUser.val());    
                        formUser.css({
                            display: 'none'
                        });

                        formAdress.css({
                            display: 'block'
                        });

                        formOmitir.css({
                            display: 'block'
                        });

                        opt2.addClass('active');

                        idUser.val(id); 

                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Error Al Crear El Usuario',
                            icon: 'error',
                            confirmButtonColor: '#c20031',
                        });
                    }
                });
            });

            /* ----------------------------------------------------------------------------- */

            let select_departments = $('#select_departments');
            let select_municipalities = $('#select_municipalities');

            $.get('/departments', function(departments){
                console.log(departments);

                for(let department in departments) {
                    let option = document.createElement('option');
                    option.setAttribute('value', departments[department].id);
                    option.innerHTML = departments[department].name_department;

                    select_departments.append(option);
                };
            });

            /* ----------------------------------------------------------------------------- */
            
            $( "#select_departments" ).change(function() {
                    $.get('/municipalities/'+select_departments.val(), function(municipalities){
                        select_municipalities.empty();
                        let option = document.createElement('option');
                        option.innerHTML = 'Seleccione un municipio...';
                        select_municipalities.append(option);

                        for(let municipality in municipalities) {
                        let option = document.createElement('option');
                        option.setAttribute('value', municipalities[municipality].id);
                        option.innerHTML = municipalities[municipality].name_municipality;
                        select_municipalities.append(option);
                    };  
                });
                console.log(select_departments.val()); 
                console.log(select_municipalities.val());   
            });

            

            /* ----------------------------------------------------------------------------- */

            $('#btn-omitir').click(function(event){
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¿Desea omitir este paso?",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#00796b',
                    cancelButtonColor: '#c20031',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        //window.location.replace('/users');
                        $(this).parent().submit();
                    }
                });
            });

            /* ----------------------------------------------------------------------------- */

            $('.btn-desactivar').click(function(event){
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¿Desea desactivar este usuario?",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#00796b',
                    cancelButtonColor: '#c20031',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $(this).parent().submit();
                    }
                });
            });

            /* ----------------------------------------------------------------------------- */
            /* ----------------------------------------------------------------------------- */
        });
    </script>
</body>
</html>
