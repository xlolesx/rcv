@extends('layouts.admin-modules')

@section('module')
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/change-password/{{$id}}" class="btn btn-primary">
                Cambiar contraseña
            </a>
            <div class="card">
                <div class="card-header">Actualizar Usuario</div>

                <div class="card-body">
                    <form method="POST" action="/admin/edit-admin/{{$id}}" id="register_form">
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
                                <label for="ci" class="col-form-label text-md-right">Documento de identificación</label>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">               
                                        <select name="id_type" class="form-control custom-select" required id="id_type">
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
                                        <select name="sp_prefix" class="form-control custom-select" id="number_code">
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
                    </div>

                    <div class="form-group row mb-0 mt-2">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ">
                                Actualizar
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
<script>

    const form = document.getElementById('register_form');

    const name = document.getElementById('name');
    const id_type = document.getElementById('id_type');
    const ci = document.getElementById('ci');
    const number_code = document.getElementById('number_code');
    const phone_number = document.getElementById('phone_number');
    const email = document.getElementById('email');

    const emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const reg = /^\d+$/;

    let notValidated = [];

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

    name.addEventListener('keyup', () => {
        if (name.value === "" || name.value == null) {
            name.classList.add('is-invalid');
            if (!notValidated.includes(1)) {     
                notValidated.push(1);
            }
        } else {
            name.classList.remove('is-invalid');         
            name.classList.add('is-valid');
            removeA(notValidated, 1);
        }   
    });

    id_type.addEventListener('change', () => {
        if (id_type.value === "" || id_type.value == null) {
            id_type.classList.add('is-invalid');
            if (!notValidated.includes(2)) {     
                notValidated.push(2);
            }
        } else {
            id_type.classList.remove('is-invalid');         
            id_type.classList.add('is-valid');
            removeA(notValidated, 2);
        }   
    });

    ci.addEventListener('keyup', () => {
        if (reg.test(ci.value) == false || ci.value === '' || ci.value == null ||  ci.value.length > 9 || ci.value.length < 7) {
            ci.classList.add('is-invalid');
            if (!notValidated.includes(3)) {
                notValidated.push(3);
            }
        } else {
            ci.classList.remove('is-invalid');
            ci.classList.add('is-valid');
            removeA(notValidated, 3);           
        }
    })

    number_code.addEventListener('change', () => {
        if (number_code.value === "" || number_code.value == null) {
            number_code.classList.add('is-invalid');
            if (!notValidated.includes(4)) {     
                notValidated.push(4);
            }
        } else {
            number_code.classList.remove('is-invalid');         
            number_code.classList.add('is-valid');
            removeA(notValidated, 4);
        }   
    });

    phone_number.addEventListener('keyup', () => {
        if (reg.test(phone_number.value) == false || phone_number.value === '' || phone_number.value == null ||  phone_number.value.length > 8 || phone_number.value.length < 7){
            phone_number.classList.add('is-invalid');
            if (!notValidated.includes(5)) {
                notValidated.push(5);
            }       
        }else {
            phone_number.classList.remove('is-invalid');
            phone_number.classList.add('is-valid');
            removeA(notValidated, 5);           
        }
    })

    email.addEventListener('keyup', () => {
        if (emailReg.test(email.value) == false || email === "" || email == null) {
            email.classList.add('is-invalid');
            if (!notValidated.includes(6)) {
                notValidated.push(6);
            }
        }else {
            email.classList.remove('is-invalid');
            email.classList.add('is-valid');
            removeA(notValidated, 6);
        }
    });

    form.addEventListener('submit', (e) => {
        if (notValidated.length > 0) {
            e.preventDefault();
        }
    })


</script>
@endsection