<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <title>RCV</title>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}    
    <script src="{{ asset('js/popper.min.js') }}"></script>

	<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    {{-- <script src="http://code.highcharts.com/highcharts.js"></script> --}}
    <script src="{{asset('js/highcharts.js')}}"></script>
    {{-- <script src="http://code.highcharts.com/modules/exporting.js"></script> --}}

    <script src="{{asset('js/exporting.js')}}"></script>
    <script src="{{asset('js/export-data.js')}}"></script>
    <script src="{{asset('js/accessibility.js')}}"></script>
    <script src="https://kit.fontawesome.com/628b694e45.js" crossorigin="anonymous"></script>
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-app.css') }}" rel="stylesheet">
    <link href="{{ asset('Datatables/datatables.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body >
<!-------------------------------N A V B A R --------------------------------->

    <nav class="navbar navbar-dark bg-dark navbar-expand-md green-border-bottom">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/admin') }}">
                    {{ config('app.name', 'Previseguros') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}">Iniciar Sesion - Admin</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.register') }}">Registrar Administrador</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
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

    @if(Auth::check())
    <div class="container">

        <nav class="navbar transparent navbar-expand-md navbar-light bg-white mt-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-center" id="main-menu">
                <ul class="navbar-nav ">
                    @if(Request::is('admin'))
                    <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link text-white highlight-current-home home-button">Inicio</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link text-white home-button">Inicio</a></li>
                    @endif
                    
                    @if(Request::is('admin/index-policies') || Request::is('admin/register-policy') || Request::is('admin/edit-policy/*') || Request::is('admin/index-policy/*'))                   
                    <li class="nav-item ml-3"><a href="{{ route('index.policies') }}" class="nav-link text-white highlight-current">Polizas</a></li>
                    @else
                    <li class="nav-item ml-3"><a href="{{ route('index.policies') }}" class="nav-link text-white ">Polizas</a></li>
                    @endif
    
                    @if(Request::is('admin/index-vehicles') || Request::is('admin/register-vehicle') || Request::is('admin/edit-vehicle/*'))
                    <li class="nav-item ml-3"><a href="{{ route('index.vehicles') }}" class="nav-link text-white highlight-current">Vehiculos</a></li>
                    @else
                    <li class="nav-item ml-3"><a href="{{ route('index.vehicles') }}" class="nav-link text-white ">Vehiculos</a></li>
                    @endif

                    @if(Request::is('admin/index-offices') || Request::is('admin/register-office') || Request::is('admin/edit-office/*'))
                    <li class="nav-item ml-3"><a href="{{ route('index.offices') }}" class="nav-link text-white highlight-current">Oficinas</a></li>
                    @else
                    <li class="nav-item ml-3"><a href="{{ route('index.offices') }}" class="nav-link text-white ">Oficinas</a></li>
                    @endif
    
                    @if(Request::is('admin/index-prices') || Request::is('admin/register-price') || Request::is('admin/edit-price/*') || Request::is('admin/index-price/*'))
                    <li class="nav-item ml-3"><a href="{{ route('index.prices') }}" class="nav-link text-white highlight-current">Precios</a></li>
                    @else
                    <li class="nav-item ml-3"><a href="{{ route('index.prices') }}" class="nav-link text-white ">Precios</a></li>
                    @endif

                    @if(Request::is('admin/index-users') || Request::is('register') || Request::is('admin/edit-user/*') || Request::is('admin/index-user/*'))
                    <li class="nav-item ml-3"><a href="{{ route('index.users') }}" class="nav-link text-white highlight-current">Usuarios</a></li>
                    @else
                    <li class="nav-item ml-3"><a href="{{ route('index.users') }}" class="nav-link text-white ">Usuarios</a></li>
                    @endif
                    
                    @if(Request::is('admin/index-payments') || Request::is('admin/index-payment/*'))
                    <li class="nav-item ml-3"><a href="{{ route('index.payments') }}" class="nav-link text-white highlight-current">Consultas de Pago</a></li>
                    @else
                    <li class="nav-item ml-3"><a href="{{ route('index.payments') }}" class="nav-link text-white ">Consultas de Pago</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
    @endif

    <main class="container">
        @include('partials.messages')
        @yield('module')
    </main>



<!-------------------------------END N A V B A R --------------------------------->

<!-----------------------------------SCRIPTS------------------------------------>
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function () {
             $.ajaxSetup ({
                cache: false
            });
            $('#brand').change(function() {
                var brand = $('#brand option:selected').text();
                console.log(brand);
                $.ajax({
                    url:"{{ route('policy.search.vehicle') }}",
                    type:"GET",
                    data:{brandId:brand},
                    dataType:"Text",
                    success:function (brand) {
                        $('#model').html(brand);
                    }
                })
            });

            $('#estado').change(function(){
                var estado = $(this).val();
                console.log(estado);
                $.ajax({
                    url:"{{ route('office.search.municipio')  }}",
                    type:"GET",
                    data:{estadoId:estado},
                    dataType:"Text",
                    success:function (estado) {
                        $('#municipio').html(estado);
                    }
                })
            });

            $('#municipio').change(function(){
                var municipio = $(this).val();
                console.log(municipio);
                $.ajax({
                    url:"{{ route('office.search.parroquia')  }}",
                    type:"GET",
                    data:{municipioId:municipio},
                    dataType:"Text",
                    success:function (municipio) {
                        $('#parroquia').html(municipio);
                    }
                })
            });

            $('#price').change(function(){
                var data = $(this).val();
                console.log(data);
                $.ajax({
                    url:"{{ route('policy.price.view')  }}",
                    type:"GET",
                    data:{priceId:data},
                    dataType:"Text",
                    success:function (data) {
                        $('#quick_view').html(data);
                    }
                })
            });
        });
     </script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('Datatables/datatables.min.js')}}" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatest').DataTable({
            "language": {
                "url": "{{asset('Datatables/spanish.json')}}"
            }
        } );
        } );
    </script>
    @yield('scripts')

</body>
</html> 