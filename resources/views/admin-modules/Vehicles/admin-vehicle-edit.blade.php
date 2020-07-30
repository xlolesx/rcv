@extends('layouts.admin-modules')

@section('module')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar Vehiculo</div>

                <div class="card-body">
                    <form method="POST" action="/admin/edit-vehicle/{{$id}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">Marca</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" required autocomplete="brand" autofocus value="{{$vehicle->brand}}">

                                @error('brand')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">Modelo</label>

                            <div class="col-md-6">
                                <input id="model" type="model" class="form-control @error('model') is-invalid @enderror" name="model" required autocomplete="model" value="{{$vehicle->model}}">

                                @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vehicleType" class="col-md-4 col-form-label text-md-right">Tipo de vehiculo</label>

                            <div class="col-md-6">
                                <select id="vehicleType" name="vehicleType" class="form-control custom-select" required>
                                    @if($vehicle->vehicle_type == 0)
                                    <option value="0">Carro</option>
                                    @else
                                    <option value="1">Moto</option>
                                    @endif
                                    <option value="0">Carro</option>
                                    <option value="1">Moto</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>

                                <a href="{{ route('index.vehicles') }}" class="btn btn-danger" style="width: 90px;">
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
    
    const form = document.getElementById('vehicle_form');
    let notValidated = [];

    const vehicle_brand = document.getElementById('brand');
    const vehicle_model = document.getElementById('model');
    const vehicle_type = document.getElementById('vehicleType');

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



    vehicle_brand.addEventListener('keyup', () => {
        if (vehicle_brand.value === '' || vehicle_brand.value == null) {
            vehicle_brand.classList.add('is-invalid');
            if (!notValidated.includes(1)) {     
                notValidated.push(1);
            }
        } else {
            vehicle_brand.classList.remove('is-invalid');         
            vehicle_brand.classList.add('is-valid');
            removeA(notValidated, 1);
        }   
    });

    vehicle_model.addEventListener('keyup', () => {
        if (vehicle_model.value === '' || vehicle_model.value == null) {
            vehicle_model.classList.add('is-invalid');
            if (!notValidated.includes(2)) {     
                notValidated.push(2);
            }
        } else {
            vehicle_model.classList.remove('is-invalid');         
            vehicle_model.classList.add('is-valid');
            removeA(notValidated, 2);
        }   
    });

    vehicle_type.addEventListener('change', () => {
        if (vehicle_type.value === '' || vehicle_type.value == null) {
            vehicle_type.classList.add('is-invalid');
            if (!notValidated.includes(3)) {     
                notValidated.push(3);
            }
        } else {
            vehicle_type.classList.remove('is-invalid');         
            vehicle_type.classList.add('is-valid');
            removeA(notValidated, 3);
        }   
    });

    form.addEventListener('submit', (e) => {
        if (notValidated.length > 0) {
            e.preventDefault();
        }
    })

</script>
@endsection