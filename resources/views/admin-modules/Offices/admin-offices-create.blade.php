@extends('layouts.admin-modules')

@section('module')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de oficina</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.office.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror is-invalid" name="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select id="estado" name="estado" class="form-control custom-select @error('estado') is-invalid @enderror is-invalid">
                                    <option value="">- Seleccionar -</option>
                                    @foreach($estados as $estado)
                                    <option value="{{$estado->id_estado}}">{{$estado->estado}}</option>
                                    @endforeach
                                </select>                                

                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="municipio" class="col-md-4 col-form-label text-md-right">Municipio</label>

                            <div class="col-md-6">
                                <select id="municipio" name="municipio" class="form-control custom-select @error('municipio') is-invalid @enderror is-invalid">
                                    <option value="">- Seleccionar Municipio -</option>
                                </select>                                
                            </div>

                            @error('municipio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="parroquia" class="col-md-4 col-form-label text-md-right">Parroquia</label>

                            <div class="col-md-6">
                                <select id="parroquia" name="parroquia" class="form-control custom-select @error('parroquia') is-invalid @enderror is-invalid">
                                    <option value="">- Seleccionar Parroquia -</option>
                                </select>                                
                            </div>

                            @error('parroquia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>

                                <a href="{{ route('index.offices') }}" class="btn btn-danger" style="width: 90px;">
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
<script src="{{asset('js/Form-Validations/Offices.js')}}"></script>
@endsection