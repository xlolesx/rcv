@extends('layouts.admin-modules')

@section('module')
<div class="container mt-3 mb-5">
    <div class="row justify-content-center">
        
    
    <div class="card" 
    	style="width: 35rem;
    	-webkit-box-shadow: -25px -16px 66px -42px rgba(0,0,0,0.75);
        -moz-box-shadow: -25px -16px 66px -42px rgba(0,0,0,0.75);
        box-shadow: -25px -16px 66px -42px rgba(0,0,0,0.75);
    	height: 500px;">
    	<div class="card-header">
        Informacion de usuario
        <a href="{{route('index.users')}}" class="bg-transparent float-right text-danger">X</a>
      	</div>
      <div class="card-body">        
            <h5 class="card-title text-center border-bottom border-top">Información del sistema</h5>
            <div class="row">
                <div class="col-4 text-center">
                    <h6 class="card-title">Fecha de ingreso:</h5>        
                    <strong>{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</strong>
                </div>

                <div class="col-4 text-center">
                    <h6 class="card-title">Nombre de Usuario:</h5>        
                    <strong>{{$user->username}}</strong>
                </div>

                <div class="col-4 text-center">
                    <h6 class="card-title">Porcentaje de ganancia:</h5>        
                    <strong>{{$user->profit_percentage}}%</strong>
                </div>
            </div>

            <h5 class="card-title text-center border-top border-bottom mt-3">Información Personal</h5>
            <div class="row">
                <div class="col-4 text-center">
                    <h6 class="card-title">Nombres:</h6>
                    <strong>{{$user->name}}</strong>
                </div>

                <div class="col-4 text-center">
                    <h6 class="card-title">Apellidos:</h6>
                    <strong>{{$user->lastname}}</strong>
                </div>

                <div class="col-4 text-center">
                    <h6 class="card-title">Cédula:</h6>
                    <strong>{{$user->ci}}</strong>
                </div>
            </div>

            <h5 class="card-title text-center border-top border-bottom mt-3">Oficina</h5>
            <div class="row">
                <div class="col-12 text-center">
                    <strong>{{$user->office->office_address. ', ' .$user->office->estado->estado. ', ' .$user->office->municipio->municipio. ', ' .$user->office->parroquia->parroquia}}</strong>
                </div>
            </div>

            <h5 class="card-title text-center border-top border-bottom mt-3">Pólizas</h5>
            <div class="row">
                <div class="col-6 text-center">
                    <h6 class="card-title">Cant. Pólizas Vehiculos de 4 ruedas:</h6>
                    <strong>{{$count_cars}}</strong>
                </div>

                <div class="col-6 text-center">
                    <h6 class="card-title">Cant. Pólizas Vehiculos de 2 ruedas:</h6>
                    <strong>{{$count_motorcycles}}</strong>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <form action="/admin/delete-user/{{$user->id}}" method="POST">
                    <a href="/admin/edit-user/{{$user->id}}" class="btn bg-white text-dark">Editar Usuario</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-danger text-white">Eliminar Usuario</button>  
                </form>
            </div>
      </div>
        
    </div>
    </div>
</div>
@endsection