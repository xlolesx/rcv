@extends('layouts.admin-modules')

@section('module')
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Usuario - Administrador</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register.submit') }}" id="register_form">
                        @csrf

                        <div class="form-row border-bottom border-dark">                        
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label text-md-right">Nombre de usuario</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label text-md-right">Correo electronico</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">

                                @error('email')
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
                                        <select name="id_type" class="form-control custom-select" required id="id_type">
                                            <option value=""> - </option>
                                            <option value="V-">V</option>
                                            <option value="E-">E</option>
                                            <option value="I-">I</option>
                                            <option value="J-">J</option>
                                            <option value="G-">G</option>              
                                        </select>                                   
                                    </div>
                                    <input type="text" name="ci" id="ci" value="{{old('ci')}}"class="form-control @error('ci') is-invalid @enderror" placeholder="Cédula">

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
                                        <select name="sp_prefix" class="form-control custom-select" id="number_code">
                                            <option value="">-</option>
                                            <option value="212-">212</option>
                                            <option value="412-">412</option>
                                            <option value="416-">416</option>
                                            <option value="426-">426</option>
                                            <option value="414-">414</option>               
                                            <option value="424-">424</option>               
                                        </select>                                   
                                    </div>
                                    <input type="text" name="phone_number" id="phone_number" value="{{old('phone_number')}}"class="form-control @error('phone_number') is-invalid @enderror" placeholder="..." autocomplete="off">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label text-md-right">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-right">Confirmar Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    Registrar
                                </button>

                                <a href="{{ route('index.users.admins') }}" class="btn btn-danger" style="width: 90px;">
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

@section('scripts')
<script src="{{asset('js/Form-Validations/Admins.js')}}"></script>
@endsection