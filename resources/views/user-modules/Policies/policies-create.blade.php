@extends('layouts.user-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Registro de poliza</h6>
		<a href="{{route('user.index.policies')}}" class="float-right btn btn-danger text-white">X</a> 
	</div>
	<div class="card-body">

		<form action="{{ route('user.register.policy.submit')}}" method="POST" id="form_policies">
			@csrf

			<h3>Datos del cliente</h3>
			<div class="form-row border-bottom border-dark">
				<div class="form-group col-md-6">
					<label for="client_name">Nombre</label>
					<input autocomplete="off" type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror is-invalid" placeholder="..." value="{{ old('client_name') }}">

					@error('client_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group col-md-6">
					<label for="client_lastname">Apellido</label>
					<input autocomplete="off" type="text" name="client_lastname" id="client_lastname" class="form-control @error('client_lastname') is-invalid @enderror is-invalid" placeholder="..." value="{{ old('client_lastname') }}">

					@error('client_lastname')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group col-md-4">
					<label for="ci">Documento de identificación</label>
					<div class="input-group">
						<div class="input-group-prepend">				
							<select name="id_type" class="form-control custom-select is-invalid" id="id_type" required>
								<option value="">-</option>
								<option value="V-">V</option>
								<option value="E-">E</option>
								<option value="I-">I</option>
								<option value="J-">J</option>
								<option value="G-">G</option>				
							</select>									
						</div>
						<input autocomplete="off" type="text" class="form-control @error('client_ci') is-invalid @enderror is-invalid" name="client_ci" id="ci" placeholder="..." value="{{ old('client_ci') }}">

						@error('client_ci')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group col-md-4">                            
					<label for="client_phone" class="text-md-right">Número de teléfono</label>
					<div class="input-group">
						<div class="input-group-prepend">               
							<select name="sp_prefix" class="form-control custom-select is-invalid" id="number_code" required>
								<option value="">-</option>
								<option value="212-">212</option>
								<option value="412-">412</option>
								<option value="416-">416</option>
								<option value="426-">426</option>
								<option value="414-">414</option>               
								<option value="424-">424</option>               
							</select>                                   
						</div>
						<input type="text" name="client_phone" id="client_phone" value="{{old('client_phone')}}"class="form-control @error('client_phone') is-invalid @enderror is-invalid" placeholder="...">

						@error('client_phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group col-md-4">
					<label for="client_email">Correo Electronico</label>
					<input autocomplete="off" type="email" class="form-control @error('client_email') is-invalid @enderror is-invalid" name="client_email" id="client_email" placeholder="..." value="{{ old('client_email') }}">

					@error('client_email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<h3 class="mt-4">Datos del vehiculo</h3>

			<div class="form-row border-bottom border-dark">
				<div class="form-group col-md-6">
					<select name="vehicleBrand" class="form-control @error('vehicleBrand') is-invalid @enderror custom-select is-invalid" id="brand" >
						<option value=""> - Seleccionar Marca -</option>
						@foreach($vehicles as $vehicle)
						<option value="{{$vehicle->brand}}">{{$vehicle->brand}}</option>
						@endforeach
					</select>

					@error('vehicleBrand')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<select name="vehicleModel" class="form-control @error('vehicleModel') is-invalid @enderror mt-2 mb-2 custom-select is-invalid" id="model" >
						<option value=""> - Seleccionar Modelo - </option>
					</select>

					@error('vehicleModel')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_year">Año</label>
					<input autocomplete="off" type="number" name="vehicle_year" id="vehicle_year" class="form-control @error('vehicle_year') is-invalid @enderror is-invalid" placeholder="..." value="{{ old('vehicle_year') }}">

					@error('vehicle_year')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="type">Tipo</label>
					<input autocomplete="off" type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror is-invalid">

					@error('type')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_color">Color</label>
					<input autocomplete="off" type="text" name="vehicle_color" id="vehicle_color" class="form-control @error('vehicle_color') is-invalid @enderror is-invalid" placeholder="..." value="{{ old('vehicle_color') }}">

					@error('vehicle_color')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror


					<label for="used_for">Uso del vehiculo</label>
					<select id="used_for" name="used_for" class="form-control @error('used_for') is-invalid @enderror custom-select is-invalid">
						<option value="">- Seleccionar -</option>				
						<option value="Particular">Particular</option>				
						<option value="Carga">Carga</option>				
						<option value="Grua">Grua</option>				
						<option value="Transporte Publico">Transporte Publico</option>
						<option value="Competencia">Competencia</option>				
					</select>

					@error('used_for')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror


				</div>

				<div class="form-group col-md-6">

					<label for="vehicle_bodywork_serial">Serial de carroceria</label>
					<input autocomplete="off" type="text" name="vehicle_bodywork_serial" id="vehicle_bodywork_serial" class="form-control @error('vehicle_bodywork_serial') is-invalid @enderror is-invalid" style="text-transform:uppercase;" placeholder="..." value="{{ old('vehicle_bodywork_serial') }}">

					@error('vehicle_bodywork_serial')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_motor_serial">Serial del motor</label>
					<input autocomplete="off" type="text" name="vehicle_motor_serial" id="vehicle_motor_serial" class="form-control @error('vehicle_motor_serial') is-invalid @enderror is-invalid" style="text-transform:uppercase;" placeholder="..." value="{{ old('vehicle_motor_serial') }}">

					@error('vehicle_motor_serial')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_certificate_number">Numero de certificado</label>
					<input autocomplete="off" type="text" name="vehicle_certificate_number" id="vehicle_certificate_number" class="form-control @error('vehicle_certificate_number') is-invalid @enderror is-invalid" style="text-transform:uppercase;" placeholder="..." value="{{ old('vehicle_certificate_number') }}">

					@error('vehicle_certificate_number')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_weight">Peso del vehiculo</label>
					<div class="input-group">
						<input autocomplete="off" type="number" name="vehicle_weight" id="vehicle_weight" class="form-control @error('vehicle_weight') is-invalid @enderror is-invalid" placeholder="Kg" value="{{ old('vehicle_weight') }}">
						<div class="input-group-append">
							<span class="input-group-text">Kg</span>
						</div>
					</div>

					@error('vehicle_weight')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_registration">Matricula</label>
					<input autocomplete="off" type="text" name="vehicle_registration" id="vehicle_registration" class="form-control @error('vehicle_registration') is-invalid @enderror is-invalid" style="text-transform:uppercase;" placeholder="..." value="{{ old('vehicle_registration') }}">

					@error('vehicle_registration')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

				</div>

			</div>

			<h3 class="mt-4">Poliza</h3>

			<div class="form-group">
				<label for="price">Seleccionar poliza</label>
				<select name="price" class="form-control @error('price') is-invalid @enderror custom-select is-invalid" id="price" >
					<option value=""> - Seleccionar - </option>
					@foreach($prices as $price)
					<option value="{{$price->id}}">{{$price->description}}</option>
					@endforeach
				</select>
			</div>

			@error('price')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror


			<div class="row mb-4" id="quick_view">
				{{-- price view ajax request --}}
			</div>

			<button id="submitButton" type="submit" class="btn btn-primary btn-block mt-3">Registrar Poliza</button>
		</form>
	</div>
</div>
{{-- <script src="{{ asset('js/custom-app.js') }}"></script> --}}
@endsection

@section('scripts')
<script>
	let objects = document.getElementsByClassName('prices_se');
	let select_price = document.getElementById('price');

	select_price.addEventListener('change', function() {
		for(object of objects){
			console.log(object.innerText);
			object.innerText = number_format(object.innerText);
		}
	});
	function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
  	var k = Math.pow(10, prec);
  	return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
  	s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
  	s[1] = s[1] || '';
  	s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}


</script>

<script src="{{asset('js/Form-Validations/Policies.js')}}"></script>
@endsection