@extends('layouts.admin-modules')

@section('module')
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register_form">
                        @csrf

                        <div class="form-row border-bottom border-dark">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label text-md-right">Nombres</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror is-invalid" name="name" value="{{ old('name') }}" autocomplete="off" autofocu>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="lastname" class="col-form-label text-md-right">Apellidos</label>
                                <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror is-invalid" name="lastname" value="{{ old('lastname') }}" autocomplete="off">

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
                                        <select name="id_type" class="form-control custom-select is-invalid" required id="id_type">
                                            <option value=""> - </option>
                                            <option value="V-">V</option>
                                            <option value="E-">E</option>
                                            <option value="I-">I</option>
                                            <option value="J-">J</option>
                                            <option value="G-">G</option>
                                        </select>                                   
                                    </div>
                                    <input type="text" name="ci" id="ci" value="{{old('ci')}}"class="form-control @error('ci') is-invalid @enderror is-invalid" placeholder="Cédula">

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
                                            <select name="sp_prefix" class="form-control custom-select is-invalid" required id="number_code">
                                                <option value="">-</option>
                                                <option value="212-">212</option>
                                                <option value="412-">412</option>
                                                <option value="416-">416</oaption>
                                                <option value="426-">426</option>
                                                <option value="414-">414</option>   
                                                <option value="424-">424</option>               
                                            </select>                                   
                                        </div>
                                        <input type="text" name="phone_number" id="phone_number" value="{{old('phone_number')}}"class="form-control @error('phone_number') is-invalid @enderror is-invalid" placeholder="...">

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
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror is-invalid" name="username" value="{{ old('username') }}" autocomplete="off">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email" class="col-form-label text-md-right">Correo Eléctronico</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror is-invalid" name="email" value="{{ old('email') }}" autocomplete="off">

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
                                    <select id="office_id" name="office_id" class="form-control custom-select is-invalid">
                                        <option value="">- Seleccionar Oficina -</option>
                                        @foreach($offices as $office)
                                        <option value="{{$office->id}}">{{$office->office_address}}</option>
                                        @endforeach
                                    </select>                                
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="profit_percentage" class=" col-form-label text-md-right">Porcentaje de Ganancias</label>
                                    <div class="input-group">                            
                                        <input type="number" step="0.01" id="profit_percentage" name="profit_percentage" class="form-control @error('profit_percentage') is-invalid @enderror is-invalid" value="{{old('profit_percentage')}}}">

                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>

                                        @error('profit_percentage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-row border-bottom border-dark">                
                                <div class="form-group col-md-6">
                                    <label for="password" class="col-form-label text-md-right">Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror is-invalid" name="password" autocomplete="off-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password-confirm" class="col-form-label text-md-right">Confirmar Contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control is-invalid" name="password_confirmation" autocomplete="off-password">
                                </div>
                            </div>


                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary ">
                                        Registrar
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

    @section('scripts')
    <script>
        const form = document.getElementById('register_form');

        const name = document.getElementById('name');
        const lastname = document.getElementById('lastname');
        const id_type = document.getElementById('id_type');
        const ci = document.getElementById('ci');
        const number_code = document.getElementById('number_code');
        const phone_number = document.getElementById('phone_number');
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const office = document.getElementById('office_id');
        const profit_percentage = document.getElementById('profit_percentage');
        const password = document.getElementById('password');
        const password_confirm = document.getElementById('password-confirm');

        const emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const reg = /^\d+$/;
        const perReg = /^[0-9.]+$/;


        let notValidated = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

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

        lastname.addEventListener('keyup', () => {
            if (lastname.value === "" || lastname.value == null) {
                lastname.classList.add('is-invalid');
                if (!notValidated.includes(2)) {     
                    notValidated.push(2);
                }
            } else {
                lastname.classList.remove('is-invalid');         
                lastname.classList.add('is-valid');
                removeA(notValidated, 2);
            }   
        });

        id_type.addEventListener('change', () => {
            if (id_type.value === "" || id_type.value == null) {
                id_type.classList.add('is-invalid');
                if (!notValidated.includes(3)) {     
                    notValidated.push(3);
                }
            } else {
                id_type.classList.remove('is-invalid');         
                id_type.classList.add('is-valid');
                removeA(notValidated, 3);
            }   
        });

        ci.addEventListener('keyup', () => {
            if (reg.test(ci.value) == false || ci.value === '' || ci.value == null ||  ci.value.length > 9 || ci.value.length < 7) {
                ci.classList.add('is-invalid');
                if (!notValidated.includes(4)) {
                    notValidated.push(4);
                }
            } else {
                ci.classList.remove('is-invalid');
                ci.classList.add('is-valid');
                removeA(notValidated, 4);           
            }
        })

        number_code.addEventListener('change', () => {
            if (number_code.value === "" || number_code.value == null) {
                number_code.classList.add('is-invalid');
                if (!notValidated.includes(5)) {     
                    notValidated.push(5);
                }
            } else {
                number_code.classList.remove('is-invalid');         
                number_code.classList.add('is-valid');
                removeA(notValidated, 5);
            }   
        });

        phone_number.addEventListener('keyup', () => {
            if (reg.test(phone_number.value) == false || phone_number.value === '' || phone_number.value == null ||  phone_number.value.length > 8 || phone_number.value.length < 7){
                phone_number.classList.add('is-invalid');
                if (!notValidated.includes(6)) {
                    notValidated.push(6);
                }       
            }else {
                phone_number.classList.remove('is-invalid');
                phone_number.classList.add('is-valid');
                removeA(notValidated, 6);           
            }
        })

        username.addEventListener('keyup', () => {
            if (username.value === "" || username.value == null) {
                username.classList.add('is-invalid');
                if (!notValidated.includes(7)) {     
                    notValidated.push(7);
                }
            } else {
                username.classList.remove('is-invalid');         
                username.classList.add('is-valid');
                removeA(notValidated, 7);
            }   
        });

        email.addEventListener('keyup', () => {
            if (emailReg.test(email.value) == false || email === "" || email == null) {
                email.classList.add('is-invalid');
                if (!notValidated.includes(8)) {
                    notValidated.push(8);
                }
            }else {
                email.classList.remove('is-invalid');
                email.classList.add('is-valid');
                removeA(notValidated, 8);
            }
        });

        office.addEventListener('change', () => {
            if (office.value === "" || office.value == null) {
                office.classList.add('is-invalid');
                if (!notValidated.includes(9)) {     
                    notValidated.push(9);
                }
            } else {
                office.classList.remove('is-invalid');         
                office.classList.add('is-valid');
                removeA(notValidated, 9);
            }   
        });

        profit_percentage.addEventListener('keyup', () => {
            if (profit_percentage.value === "" || profit_percentage.value == null || profit_percentage.value.length > 6 || perReg.test(profit_percentage.value) == false || profit_percentage.value > 100) {
                profit_percentage.classList.add('is-invalid');
                if (!notValidated.includes(10)) {
                    notValidated.push(10);
                }
            } else {
                profit_percentage.classList.remove('is-invalid');         
                profit_percentage.classList.add('is-valid');
                removeA(notValidated, 10);        
            }
        })

        password.addEventListener('keyup', () => {
            if (password.value === "" || password.value == null || password.value.length < 8) {
                password.classList.add('is-invalid');
                if (!notValidated.includes(11)) {     
                    notValidated.push(11);
                }
            } else {
                password.classList.remove('is-invalid');         
                password.classList.add('is-valid');
                removeA(notValidated, 11);
            }               
        })

        password_confirm.addEventListener('keyup', () => {
            if (password_confirm.value === "" || password_confirm.value == null || password_confirm.value !== password.value || password_confirm.value.length < 8) {
                password_confirm.classList.add('is-invalid');
                if (!notValidated.includes(12)) {     
                    notValidated.push(12);
                }
            } else {
                password_confirm.classList.remove('is-invalid');         
                password_confirm.classList.add('is-valid');
                removeA(notValidated, 12);
            }               
        })


        form.addEventListener('submit', (e) => {
            if (notValidated > 0) {
                e.preventDefault();
            }
        })


    </script>
    @endsection