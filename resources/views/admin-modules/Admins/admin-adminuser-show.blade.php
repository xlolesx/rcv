@extends('layouts.admin-modules')

@section('module')
<div class="container mt-3 mb-5">
    <div class="row justify-content-center">


        <div class="card" 
        style="width: 35rem;
        -webkit-box-shadow: -25px -16px 66px -42px rgba(0,0,0,0.75);
        -moz-box-shadow: -25px -16px 66px -42px rgba(0,0,0,0.75);
        box-shadow: -25px -16px 66px -42px rgba(0,0,0,0.75);">
        <div class="card-header">
            Informacion de usuario
            <a href="{{route('index.users.admins')}}" class="bg-transparent float-right text-danger">X</a>
        </div>
        <div class="card-body">        
            <h5 class="card-title text-center border-bottom border-top">Información del sistema</h5>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h6 class="card-title">Fecha de ingreso:</h6>        
                    <strong>{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</strong>
                </div>

                <div class="col-md-6 text-center">
                    <h6 class="card-title">Nombre de Usuario:</h6>        
                    <strong>{{$user->name}}</strong>
                </div>
            </div>


            <div class="row justify-content-center mt-2">
                <a href="/admin/edit-admin/{{$user->id}}" class="btn btn-light text-dark">Editar Usuario</a>
                <span class="btn bg-danger text-white" id="openModal" data-toggle="modal" data-target="{{'#'."deleteModal-".$user->id}}">Eliminar Usuario</span>
            </div>

            <div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea <strong class="text-danger">eliminar</strong> este usuario?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Seleccione "continuar" si desea <span class="text-danger">eliminar</span> este usuario</div>
                        <div class="modal-footer">
                            <form action="/admin/delete-admin/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Continuar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
</div>
@endsection