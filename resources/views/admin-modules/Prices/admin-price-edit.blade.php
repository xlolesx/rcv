@extends('layouts.admin-modules')

@section('module')
<div class="container">
    <div class="card shadow mb-4 text-dark">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Actualizar Plan</h6>
            <a href="{{route('index.prices')}}" class="float-right btn btn-danger text-white">X</a> 

        </div>
        <div class="card-body"> 
            <form action="/admin/edit-price/{{$id}}" method="POST" id="price_form">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Descripcion:</label>
                            <input class="form-control number @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Descricion del precio" value="{{$price->description}}">

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <h3 class="mt-2 text-center">Daños:</h5>
                    <div class="form-row border-bottom">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="damage_things">Daños a cosas</label>
                                <div class="input-group">
                                    <input class="form-control number @error('damage_things') is-invalid @enderror" type="number" step="0.01" name="damage_things" id="damage_things" placeholder="Insertar precio" value="{{$price->damage_things}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>        

                                    @error('damage_things')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium1">Prima por daños a cosas</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium1') is-invalid @enderror" type="number" step="0.01" name="premium1" id="premium1" placeholder="Insertar Precio" value="{{$price->premium1}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('premium1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="damage_people">Daños a personas</label>
                                <div class="input-group">
                                    <input class="form-control number @error('damage_people') is-invalid @enderror" type="number" step="0.01" name="damage_people" id="damage_people" placeholder="Insertar precio" value="{{$price->damage_people}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('damage_people')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium2">Prima por daños a perosonas</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium2') is-invalid @enderror" type="number" step="0.01" name="premium2" id="premium2" placeholder="Insertar Precio" value="{{$price->premium2}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('premium2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-3 text-center">Inválidez y Asistencia Juridica:</h3>
                    <div class="form-row border-bottom">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disability">Invalidez</label>
                                <div class="input-group">
                                    <input class="form-control number @error('disability') is-invalid @enderror" type="number" step="0.01" name="disability" id="disability" placeholder="Insertar precio" value="{{$price->disability}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>        

                                    @error('disability')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium3">Prima por invalidez</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium3') is-invalid @enderror" type="number" step="0.01" name="premium3" id="premium3" placeholder="Insertar Precio" value="{{$price->premium3}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('premium3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="legal_assistance">Asistencia Juridica</label>
                                <div class="input-group">
                                    <input class="form-control number @error('legal_assistance') is-invalid @enderror" type="number" step="0.01" name="legal_assistance" id="legal_assistance" placeholder="Insertar precio" value="{{$price->legal_assistance}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>        

                                    @error('legal_assistance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium4">Prima por asistencia juridica</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium4') is-invalid @enderror" type="number" step="0.01" name="premium4" id="premium4" placeholder="Insertar Precio" value="{{$price->premium4}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('premium4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-3 text-center">Muerte y Gastos Médicos:</h3>
                    <div class="form-row border-bottom">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="death">Muerte</label>
                                <div class="input-group">
                                    <input class="form-control number @error('death') is-invalid @enderror" type="number" step="0.01" name="death" id="death" placeholder="Insertar precio" value="{{$price->death}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>        

                                    @error('death')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium5">Prima por muerte</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium5') is-invalid @enderror" type="number" step="0.01" name="premium5" id="premium5" placeholder="Insertar Precio" value="{{$price->premium5}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('premium5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="medical_expenses">Gastos Medicos</label>
                                <div class="input-group">
                                    <input class="form-control number @error('medical_expenses') is-invalid @enderror" type="number" step="0.01" name="medical_expenses" id="medical_expenses" placeholder="Insertar precio" value="{{$price->medical_expenses}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>        

                                    @error('medical_expenses')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium6">Prima por gastos medicos</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium6') is-invalid @enderror" type="number" step="0.01" name="premium6" id="premium6" placeholder="Insertar Precio" value="{{$price->premium6}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('premium6')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-3 text-center">Grua:</h3>
                    <div class="form-row border-bottom">
                        <div class="col-12">            
                            <div class="form-group">
                                <label for="crane">Grua</label>
                                <div class="input-group">
                                    <input class="form-control number @error('crane') is-invalid @enderror" type="number" step="0.01" name="crane" id="crane" placeholder="Insertar precio" value="{{$price->crane}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>                     

                                    @error('crane')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>            
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                             Registrar
                         </button>                
                     </div>
                 </div>
             </form> 
         </div>
     </div>
 </div>


 @endsection


 @section('scripts')
 {{-- <script src="{{asset('js/simple-mask-money.js')}}"></script> --}}
 <script>
    // let damage_things = SimpleMaskMoney.setMask('#damage_things', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });

    // let damage_people = SimpleMaskMoney.setMask('#damage_people', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let disability = SimpleMaskMoney.setMask('#disability', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let legal_assistance = SimpleMaskMoney.setMask('#legal_assistance', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let death = SimpleMaskMoney.setMask('#death', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let medical_expenses = SimpleMaskMoney.setMask('#medical_expenses', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let crane = SimpleMaskMoney.setMask('#crane', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let premium1 = SimpleMaskMoney.setMask('#premium1', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let premium2 = SimpleMaskMoney.setMask('#premium2', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let premium3 = SimpleMaskMoney.setMask('#premium3', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let premium4 = SimpleMaskMoney.setMask('#premium4', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let premium5 = SimpleMaskMoney.setMask('#premium5', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });    
    // let premium6 = SimpleMaskMoney.setMask('#premium6', {
    //     prefix: '',
    //     suffix: '',
    //     fixed: true,
    //     fractionDigits: 2,
    //     decimalSeparator: '.',
    //     thousandsSeparator: ',',
    //     emptyOrInvalid: () => {
    //         return this.SimpleMaskMoney.args.fixed
    //         ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
    //         : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
    //     }
    // });

   const form = document.getElementById('price_form')
   const description_valid = document.getElementById('description');
   const damage_things_valid = document.getElementById('damage_things');
   const premium1_valid = document.getElementById('premium1');
   const damage_people_valid = document.getElementById('damage_people');
   const premium2_valid = document.getElementById('premium2');
   const disability_valid = document.getElementById('disability');
   const premium3_valid = document.getElementById('premium3');
   const legal_assistance_valid = document.getElementById('legal_assistance');
   const premium4_valid = document.getElementById('premium4');
   const death_valid = document.getElementById('death');
   const premium5_valid = document.getElementById('premium5');
   const medical_expenses_valid = document.getElementById('medical_expenses');
   const premium6_valid = document.getElementById('premium6');
   const crane_valid = document.getElementById('crane');

   const priceReg = /^[0-9.,]+$/;
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

description_valid.addEventListener('keyup', () => {
    if (description_valid.value === "" || description_valid.value == null) {
        description_valid.classList.add('is-invalid');
        if (!notValidated.includes(1)) {
            notValidated.push(1);
        }
    } else {
        description_valid.classList.remove('is-invalid');         
        description_valid.classList.add('is-valid');
        removeA(notValidated, 1);
    }
})

damage_things_valid.addEventListener('keyup', () => {
    if (damage_things_valid.value === "" || damage_things_valid.value == null || priceReg.test(damage_things_valid.value) == false) {
        damage_things_valid.classList.add('is-invalid');
        if (!notValidated.includes(2)) {
            notValidated.push(2);
        }
    } else {
        damage_things_valid.classList.remove('is-invalid');         
        damage_things_valid.classList.add('is-valid');
        removeA(notValidated, 2);
    }
})

premium1_valid.addEventListener('keyup', () => {
    if (premium1_valid.value === "" || premium1_valid.value == null || priceReg.test(premium1_valid.value) == false) {
        premium1_valid.classList.add('is-invalid');
        if (!notValidated.includes(3)) {
            notValidated.push(3);
        }
    } else {
        premium1_valid.classList.remove('is-invalid');         
        premium1_valid.classList.add('is-valid');
        removeA(notValidated, 3);
    }
})

damage_people_valid.addEventListener('keyup', () => {
    if (damage_people_valid.value === "" || damage_people_valid.value == null || priceReg.test(damage_people_valid.value) == false) {
        damage_people_valid.classList.add('is-invalid');
        if (!notValidated.includes(4)) {
            notValidated.push(4);
        }
    } else {
        damage_people_valid.classList.remove('is-invalid');         
        damage_people_valid.classList.add('is-valid');
        removeA(notValidated, 4);
    }
})

premium2_valid.addEventListener('keyup', () => {
    if (premium2_valid.value === "" || premium2_valid.value == null || priceReg.test(premium2_valid.value) == false) {
        premium2_valid.classList.add('is-invalid');
        if (!notValidated.includes(4)) {
            notValidated.push(4);
        }
    } else {
        premium2_valid.classList.remove('is-invalid');         
        premium2_valid.classList.add('is-valid');
        removeA(notValidated, 4);
    }
})

disability_valid.addEventListener('keyup', () => {
    if (disability_valid.value === "" || disability_valid.value == null || priceReg.test(disability_valid.value) == false) {
        disability_valid.classList.add('is-invalid');
        if (!notValidated.includes(5)) {
            notValidated.push(5);
        }
    } else {
        disability_valid.classList.remove('is-invalid');         
        disability_valid.classList.add('is-valid');
        removeA(notValidated, 5);
    }
})

premium3_valid.addEventListener('keyup', () => {
    if (premium3_valid.value === "" || premium3_valid.value == null || priceReg.test(premium3_valid.value) == false) {
        premium3_valid.classList.add('is-invalid');
        if (!notValidated.includes(6)) {
            notValidated.push(6);
        }
    } else {
        premium3_valid.classList.remove('is-invalid');         
        premium3_valid.classList.add('is-valid');
        removeA(notValidated, 6);
    }
})

legal_assistance_valid.addEventListener('keyup', () => {
    if (legal_assistance_valid.value === "" || legal_assistance_valid.value == null || priceReg.test(legal_assistance_valid.value) == false) {
        legal_assistance_valid.classList.add('is-invalid');
        if (!notValidated.includes(7)) {
            notValidated.push(7);
        }
    } else {
        legal_assistance_valid.classList.remove('is-invalid');         
        legal_assistance_valid.classList.add('is-valid');
        removeA(notValidated, 7);
    }
})

premium4_valid.addEventListener('keyup', () => {
    if (premium4_valid.value === "" || premium4_valid.value == null || priceReg.test(premium4_valid.value) == false) {
        premium4_valid.classList.add('is-invalid');
        if (!notValidated.includes(8)) {
            notValidated.push(8);
        }
    } else {
        premium4_valid.classList.remove('is-invalid');         
        premium4_valid.classList.add('is-valid');
        removeA(notValidated, 8);
    }
})

death_valid.addEventListener('keyup', () => {
    if (death_valid.value === "" || death_valid.value == null || priceReg.test(death_valid.value) == false) {
        death_valid.classList.add('is-invalid');
        if (!notValidated.includes(9)) {
            notValidated.push(9);
        }
    } else {
        death_valid.classList.remove('is-invalid');         
        death_valid.classList.add('is-valid');
        removeA(notValidated, 9);
    }
})

premium5_valid.addEventListener('keyup', () => {
    if (premium5_valid.value === "" || premium5_valid.value == null || priceReg.test(premium5_valid.value) == false) {
        premium5_valid.classList.add('is-invalid');
        if (!notValidated.includes(10)) {
            notValidated.push(10);
        }
    } else {
        premium5_valid.classList.remove('is-invalid');         
        premium5_valid.classList.add('is-valid');
        removeA(notValidated, 10);
    }
})

medical_expenses_valid.addEventListener('keyup', () => {
    if (medical_expenses_valid.value === "" || medical_expenses_valid.value == null || priceReg.test(medical_expenses_valid.value) == false) {
        medical_expenses_valid.classList.add('is-invalid');
        if (!notValidated.includes(11)) {
            notValidated.push(11);
        }
    } else {
        medical_expenses_valid.classList.remove('is-invalid');         
        medical_expenses_valid.classList.add('is-valid');
        removeA(notValidated, 11);
    }
})

premium6_valid.addEventListener('keyup', () => {
    if (premium6_valid.value === "" || premium6_vali.value == null || priceReg.test(premium6_val.value) == false) {
        premium6_valid.classList.add('is-invalid');
        if (!notValidated.includes(12)) {
            notValidated.push(12);
        }
    } else {
        premium6_valid.classList.remove('is-invalid');         
        premium6_valid.classList.add('is-valid');
        removeA(notValidated, 12);
    }
})

crane_valid.addEventListener('keyup', () => {
    if (crane_valid.value === "" || crane_valid.value == null || priceReg.test(crane_valid.value) == false) {
        crane_valid.classList.add('is-invalid');
        if (!notValidated.includes(13)) {
            notValidated.push(13);
        }
    } else {
        crane_valid.classList.remove('is-invalid');         
        crane_valid.classList.add('is-valid');
        removeA(notValidated, 13);
    }
})

form.addEventListener('submit', (e) => {
    if (notValidated.length > 0) {
        e.preventDefault();
    }
}) 
</script>   
@endsection