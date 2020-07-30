<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>RCV</title>
    
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom-app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b2500b15ea.js" crossorigin="anonymous"></script>
    <link href="{{ asset('Datatables/datatables.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md green-border-bottom">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> --}}
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
    </div>

    @if(Auth::check())
        <div class="container">

        <nav class="navbar transparent navbar-expand-md navbar-light bg-white mt-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-center" id="main-menu">
                <ul class="navbar-nav ">
                    @if(Request::is('dashboard'))
                    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white highlight-current-home home-button">Inicio</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white home-button">Inicio</a></li>
                    @endif

                    @if(Request::is('user/index-policies') || Request::is('user/register-policy') || Request::is('user/index-policy/*'))                   
                    <li class="nav-item"><a href="{{ route('user.index.policies') }}" class="nav-link text-white highlight-current ml-3">Polizas</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('user.index.policies') }}" class="nav-link text-white ml-3">Polizas</a></li>
                    @endif
    
                    @if(Request::is('user/index-vehicles') || Request::is('user/register-vehicle'))
                    <li class="nav-item"><a href="{{ route('user.index.vehicles') }}" class="nav-link text-white highlight-current ml-3">Vehiculos</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('user.index.vehicles') }}" class="nav-link text-white ml-3">Vehiculos</a></li>
                    @endif
    
                    @if(Request::is('user/index-prices') || Request::is('user/index-price/*'))
                    <li class="nav-item"><a href="{{ route('user.index.prices') }}" class="nav-link text-white highlight-current ml-3">Precios</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('user.index.prices') }}" class="nav-link text-white ml-3">Precios</a></li>
                    @endif

                    @if(Request::is('user/index-payments') || Request::is('user/index-payment/*'))
                    <li class="nav-item"><a href="{{ route('user.index.payments') }}" class="nav-link text-white highlight-current ml-3">Consultas de Pago</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('user.index.payments') }}" class="nav-link text-white ml-3">Consultas de Pago</a></li>
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

    <script type="text/javascript">
        $(document).ready(function () {
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