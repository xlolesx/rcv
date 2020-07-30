@extends('layouts.admin-modules')

@section('module')
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit-user/password/{{$id}}" class="btn shadow btn-primary">Cambiar contraseña</a>
            <div class="card">
                <div class="card-header">Actualizar Usuario</div>

                <div class="card-body">
                    <form method="POST" action="/admin/edit-user/{{$id}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-row border-bottom border-dark">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label text-md-right">Nombres</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" autocomplete="off" autofocu>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="lastname" class="col-form-label text-md-right">Apellidos</label>
                                <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}" autocomplete="off">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                        </div>

                        <div class="form-row border-bottom border-dark">
                            <div class="form-group col-md-6">                            
                                <label for="ci" class="col-form-label text-md-right">Documento de identificación</label>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">               
                                        <select name="id_type" class="form-control custom-select" required>
                                            <option value="{{$identification[2]}}">{{$identification[2]}}</option>
                                            <option value="V-">V</option>
                                            <option value="E-">E</option>
                                            <option value="R-">R</option>
                                            <option value="P-">P</option>
                                            <option value="C-">C</option>
                                            <option value="J-">J</option>
                                            <option value="G-">G</option>               
                                        </select>                                   
                                    </div>
                                    <input type="text" name="ci" id="ci" value="{{$identification[1]}}"class="form-control @error('ci') is-invalid @enderror" placeholder="Cédula">

                                    @error('ci')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">                            
                                <label for="phone_number" class="col-form-label text-md-right">Número de teléfono</label>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">               
                                        <select name="sp_prefix" class="form-control custom-select">
                                            <option value="{{$phone_number[0]}}-">{{$phone_number[0]}}</option>
                                            <option value="212-">212</option>
                                            <option value="412-">412</option>
                                            <option value="416-">416</option>
                                            <option value="426-">426</option>
                                            <option value="414-">414</option>               
                                            <option value="424-">424</option>               
                                        </select>                                   
                                    </div>
                                    <input type="text" name="phone_number" id="phone_number" value="{{$phone_number[1]}}"class="form-control @error('phone_number') is-invalid @enderror" placeholder="...">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row border-bottom border-dark">
                            <div class="form-group col-md-6">
                                <label for="username" class="col-form-label text-md-right">Nombre de usuario</label>
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username }}" autocomplete="off">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label text-md-right">Correo Eléctronico</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row border-bottom border-dark">
                            <div class="form-group col-md-6">
                                <label for="office_id" class="col-form-label text-md-right">Oficina</label>
                                <select id="office_id" name="office_id" class="form-control custom-select">
                                    <option value="{{$user->office_id}}">{{$user->office->office_address}}</option>
                                    @foreach($offices as $office)
                                    <option value="{{$office->id}}">{{$office->office_address}}</option>
                                    @endforeach
                                </select>                                
                            </div>


                            <div class="form-group col-md-6">
                                <label for="profit_percentage" class=" col-form-label text-md-right">Porcentaje de Ganancias</label>
                                <div class="input-group">                            
                                    <input type="number" step="0.01" id="profit_percentage" name="profit_percentage" class="form-control @error('profit_percentage') is-invalid @enderror" value="{{$user->profit_percentage}}">

                                    @error('profit_percentage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    Actualizar
                                </button>

                                <a href="{{ route('index.users') }}" class="btn btn-danger" style="width: 90px;">
                                    Volver
                                </a>

                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection