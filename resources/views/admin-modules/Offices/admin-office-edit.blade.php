@extends('layouts.admin-modules')

@section('module')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de oficina</div>

                <div class="card-body">
                    <form method="POST" action="/admin/edit-office/{{$id}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Direccion</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('brand') is-invalid @enderror" name="address" required autocomplete="brand" autofocus value="{{$office->office_address}}">

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
                                <select id="estado" name="estado" class="form-control custom-select" required>
                                    <option value="{{$office->id_estado}}">{{$office->estado->estado}}</option>
                                    @foreach($estados as $estado)
                                    <option value="{{$estado->id_estado}}">{{$estado->estado}}</option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="municipio" class="col-md-4 col-form-label text-md-right">Municipio</label>

                            <div class="col-md-6">
                                <select id="municipio" name="municipio" class="form-control custom-select" required>
                                    <option value="{{$office->id_municipio}}">{{$office->municipio->municipio}}</option>
                                    {{-- @foreach($municipios as $municipio)
                                    <option value="{{$municipio->id_municipio}}">{{$municipio->municipio}}</option>
                                    @endforeach --}}
                                </select>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parroquia" class="col-md-4 col-form-label text-md-right">Parroquia</label>

                            <div class="col-md-6">
                                <select id="parroquia" name="parroquia" class="form-control custom-select" required>
                                    <option value="{{$office->id_parroquia}}">{{$office->parroquia->parroquia}}</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
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
<script>
    const form = document.getElementById('offices_form');
    let notValidated = [];

    const address = document.getElementById('address');
    const estado = document.getElementById('estado');
    const municipio = document.getElementById('municipio');
    const parroquia = document.getElementById('parroquia');

    function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    address.addEventListener('keyup', () => {
        if (address.value === '' || address.value == null) {
            address.classList.add('is-invalid');
            if (!notValidated.includes(1)) {     
                notValidated.push(1);
            }
        } else {
            address.classList.remove('is-invalid');         
            address.classList.add('is-valid');
            removeA(notValidated, 1);
        }   
        console.log(notValidated);  
    });

    estado.addEventListener('change', () => {
        if (estado.value === '' || estado.value == null) {
            estado.classList.add('is-invalid');
            if (!notValidated.includes(2)) {     
                notValidated.push(2);
            }
        } else {
            estado.classList.remove('is-invalid');         
            estado.classList.add('is-valid');
            removeA(notValidated, 2);
        }   
        console.log(notValidated);  
    });

    municipio.addEventListener('change', () => {
        if (municipio.value === '' || municipio.value == null) {
            municipio.classList.add('is-invalid');
            if (!notValidated.includes(3)) {     
                notValidated.push(3);
            }
        } else {
            municipio.classList.remove('is-invalid');         
            municipio.classList.add('is-valid');
            removeA(notValidated, 3);
        }   
        console.log(notValidated);  
    });

    parroquia.addEventListener('change', () => {
        if (parroquia.value === '' || parroquia.value == null) {
            parroquia.classList.add('is-invalid');
            if (!notValidated.includes(4)) {     
                notValidated.push(4);
            }
        } else {
            parroquia.classList.remove('is-invalid');         
            parroquia.classList.add('is-valid');
            removeA(notValidated, 4);
        }       
        console.log(notValidated);  
    });

    form.addEventListener('submit', (e) => {
        if (notValidated.length > 0) {
            e.preventDefault();
        }
    })
</script>
@endsection