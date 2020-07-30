@extends('layouts.admin-modules')

@section('module')
<div class="container">
    <div class="card shadow mb-4 text-dark">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Nuevo Plan</h6>
            <a href="{{route('index.prices')}}" class="float-right btn btn-danger text-white">X</a> 

        </div>
        <div class="card-body">            
            <form action="{{ route('register.price.submit') }}" method="POST" id="price_form">
                @csrf
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Descripcion:</label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Descricion del precio" value="{{old('description')}}" autofocus>

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
                                    <input class="form-control number @error('damage_things') is-invalid @enderror" type="numeric" name="damage_things" id="damage_things" placeholder="Insertar precio" value="{{old('damage_things')}}">

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
                                    <input class="form-control number @error('premium1') is-invalid @enderror" type="numeric" name="premium1" id="premium1" placeholder="Insertar Precio" value="{{old('premium1')}}">

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
                                    <input class="form-control number @error('damage_people') is-invalid @enderror" type="numeric" name="damage_people" id="damage_people" placeholder="Insertar precio" value="{{old('damage_people')}}">

                                    <div class="input-group-append">
                                        <span class="input-group-text">Bs.s</span>
                                    </div>

                                    @error('damage_people')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="premium2">Prima por daños a personas</label>
                                <div class="input-group">
                                    <input class="form-control number @error('premium2') is-invalid @enderror" type="numeric" name="premium2" id="premium2" placeholder="Insertar Precio" value="{{old('premium2')}}">

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
                                    <input class="form-control number @error('disability') is-invalid @enderror" type="numeric" name="disability" id="disability" placeholder="Insertar precio" value="{{old('disability')}}">

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
                                    <input class="form-control number @error('premium3') is-invalid @enderror" type="numeric" name="premium3" id="premium3" placeholder="Insertar Precio" value="{{old('premium3')}}">

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
                                    <input class="form-control number @error('legal_assistance') is-invalid @enderror" type="numeric" name="legal_assistance" id="legal_assistance" placeholder="Insertar precio" value="{{old('legal_assistance')}}">

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
                                    <input class="form-control number @error('premium4') is-invalid @enderror" type="numeric" name="premium4" id="premium4" placeholder="Insertar Precio" value="{{old('premium4')}}">

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
                                    <input class="form-control number @error('death') is-invalid @enderror" type="numeric" name="death" id="death" placeholder="Insertar precio" value="{{old('death')}}">

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
                                    <input class="form-control number @error('premium5') is-invalid @enderror" type="numeric" name="premium5" id="premium5" placeholder="Insertar Precio" value="{{old('premium5')}}">

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
                                    <input class="form-control number @error('medical_expenses') is-invalid @enderror" type="numeric" name="medical_expenses" id="medical_expenses" placeholder="Insertar precio" value="{{old('medical_expenses')}}">

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
                                    <input class="form-control number @error('premium6') is-invalid @enderror" type="numeric" name="premium6" id="premium6" placeholder="Insertar Precio" value="{{old('premium6')}}">

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
                                    <input class="form-control number @error('crane') is-invalid @enderror" type="numeric" name="crane" id="crane" placeholder="Insertar precio" value="{{old('crane')}}">

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
 <script src="{{asset('js/simple-mask-money.js')}}"></script>
 <script type="text/javascript">
    let damage_things = SimpleMaskMoney.setMask('#damage_things', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });

    let damage_people = SimpleMaskMoney.setMask('#damage_people', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let disability = SimpleMaskMoney.setMask('#disability', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let legal_assistance = SimpleMaskMoney.setMask('#legal_assistance', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let death = SimpleMaskMoney.setMask('#death', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let medical_expenses = SimpleMaskMoney.setMask('#medical_expenses', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let crane = SimpleMaskMoney.setMask('#crane', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let premium1 = SimpleMaskMoney.setMask('#premium1', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let premium2 = SimpleMaskMoney.setMask('#premium2', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let premium3 = SimpleMaskMoney.setMask('#premium3', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let premium4 = SimpleMaskMoney.setMask('#premium4', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let premium5 = SimpleMaskMoney.setMask('#premium5', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });    
    let premium6 = SimpleMaskMoney.setMask('#premium6', {
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        emptyOrInvalid: () => {
            return this.SimpleMaskMoney.args.fixed
            ? `0${this.SimpleMaskMoney.args.decimalSeparator}00`
            : `_${this.SimpleMaskMoney.args.decimalSeparator}__`;
        }
    });
</script>

<script src="{{asset('js/Form-Validations/Prices.js')}}"></script>
@endsection