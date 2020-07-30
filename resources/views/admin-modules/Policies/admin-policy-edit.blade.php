@extends('layouts.admin-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Editar Póliza</h6>
		<a href="{{route('index.policies')}}" class="float-right btn btn-danger text-white">X</a> 

	</div>
	<div class="card-body">
		<form action="/admin/edit-policy/{{$id}}" method="POST" id="form_policies">
			@csrf
			<input type="hidden" name="_method" value="PUT">

			<h3>Datos del cliente</h3>
			<div class="form-row border-bottom border-dark">
				<div class="form-group col-md-6">
					<label for="client_name">Nombre</label>
					<input autocomplete="off" type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" placeholder="..." value="{{ $policy->client_name }}">

					@error('client_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group col-md-6">
					<label for="client_lastname">Apellido</label>
					<input autocomplete="off" type="text" name="client_lastname" id="client_lastname" class="form-control @error('client_lastname') is-invalid @enderror" placeholder="..." value="{{ $policy->client_lastname }}">

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
							<select name="id_type" class="form-control" id="id_type">
								<option value="{{$identification[2]}}">{{$identification[2]}}</option>
								<option value="V-">V</option>
								<option value="E-">E</option>
								<option value="I-">I</option>
								<option value="J-">J</option>
								<option value="G-">G</option>				
							</select>									
						</div>
						<input autocomplete="off" type="text" class="form-control @error('client_ci') is-invalid @enderror" name="client_ci" id="ci" placeholder="..." value="{{$identification[1]}}">

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
							<select name="sp_prefix" class="form-control" id="number_code">
								<option value="{{$client_phone[0]}}-">{{$client_phone[0]}}</option>
								<option value="212-">212</option>
								<option value="412-">412</option>
								<option value="416-">416</option>
								<option value="426-">426</option>
								<option value="414-">414</option>               
								<option value="424-">424</option>               
							</select>                                   
						</div>
						<input type="text" name="client_phone" id="client_phone" value="{{$client_phone[1]}}"class="form-control @error('client_phone') is-invalid @enderror" placeholder="...">

						@error('client_phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group col-md-4">
					<label for="client_email">Correo Electronico</label>
					<input autocomplete="off" type="email" class="form-control @error('client_email') is-invalid @enderror" name="client_email" id="client_email" placeholder="..." value="{{ $policy->client_email }}">

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
					<select name="vehicleBrand" class="form-control custom-select" id="brand">
						<option value="{{$policy->vehicle_brand}}">{{$policy->vehicle_brand}}</option>
						@foreach($vehicles as $vehicle)
						<option value="{{$vehicle->brand}}">{{$vehicle->brand}}</option>
						@endforeach
					</select>


					@error('vehicleBrand')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<select name="vehicleModel" class="form-control mt-2 mb-2 custom-select" id="model">
						<option value="{{$policy->vehicle_model}}">{{$policy->vehicle_model}}</option>
					</select>

					@error('vehicleModel')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_year">Año</label>
					<input autocomplete="off" type="number" name="vehicle_year" id="vehicle_year" class="form-control @error('vehicle_year') is-invalid @enderror" placeholder="..." value="{{ $policy->vehicle_year }}">

					@error('vehicle_year')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="type">Tipo</label>
					<input autocomplete="off" type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" placeholder="..." value="{{$policy->type}}">

					@error('type')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_color">Color</label>
					<input autocomplete="off" type="text" name="vehicle_color" id="vehicle_color" class="form-control @error('vehicle_color') is-invalid @enderror" placeholder="..." value="{{ $policy->vehicle_color }}">

					@error('vehicle_color')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror


					<label for="used_for">Uso del vehiculo</label>
					<select id="used_for" name="used_for" class="form-control @error('used_for') is-invalid @enderror">
						<option value="{{$policy->used_for}}">{{$policy->used_for}}</option>				
						<option value="Particular">Particular</option>				
					</select>

					@error('used_for')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group col-md-6">

					<label for="vehicle_bodywork_serial">Serial de carroceria</label>
					<input autocomplete="off" type="text" name="vehicle_bodywork_serial" id="vehicle_bodywork_serial" class="form-control @error('vehicle_bodywork_serial') is-invalid @enderror" style="text-transform:uppercase;" placeholder="..." value="{{ $policy->vehicle_bodywork_serial }}">

					@error('vehicle_bodywork_serial')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_motor_serial">Serial del motor</label>
					<input autocomplete="off" type="text" name="vehicle_motor_serial" id="vehicle_motor_serial" class="form-control @error('vehicle_motor_serial') is-invalid @enderror" style="text-transform:uppercase;" placeholder="..." value="{{ $policy->vehicle_motor_serial }}">

					@error('vehicle_motor_serial')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_certificate_number">Numero de certificado</label>
					<input autocomplete="off" type="text" name="vehicle_certificate_number" id="vehicle_certificate_number" class="form-control @error('vehicle_certificate_number') is-invalid @enderror" style="text-transform:uppercase;" placeholder="..." value="{{ $policy->vehicle_certificate_number }}">

					@error('vehicle_certificate_number')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label for="vehicle_weight">Peso del vehiculo</label>
					<div class="input-group">
						<input autocomplete="off" type="number" name="vehicle_weight" id="vehicle_weight" class="form-control @error('vehicle_weight') is-invalid @enderror" placeholder="Kg" value="{{ $weight_num[0]}}">
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
					<input autocomplete="off" type="text" name="vehicle_registration" id="vehicle_registration" class="form-control @error('vehicle_registration') is-invalid @enderror" style="text-transform:uppercase;" placeholder="..." value="{{ $policy->vehicle_registration }}">

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
				<select name="price" class="form-control @error('price') is-invalid @enderror custom-select" id="price" >
					<option value="{{$policy->price_id}}">{{$policy->price->description}}</option>
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

			<button id="submitButton" type="submit" class="btn btn-primary btn-block mt-3">Actualizar Poliza</button>
		</form>
	</div>
</div>

@endsection

@section('scripts')
<script>
	const form = document.getElementById('form_policies');
	let notValidated = [];
	const emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	const reg = /^\d+$/;
	const btn = document.getElementById('submitButton');

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

	const client_name = document.getElementById('client_name');
	client_name.addEventListener('keyup', () => {
		if (client_name.value === '' || client_name.value == null) {
			client_name.classList.add('is-invalid');
			if (!notValidated.includes(1)) {	 
				notValidated.push(1);
			}
		} else {
			client_name.classList.remove('is-invalid');			
			client_name.classList.add('is-valid');
			removeA(notValidated, 1);
		}	
	});

	const client_lastname = document.getElementById('client_lastname');
	client_lastname.addEventListener('keyup', () => {
		if (client_lastname.value === "" || client_lastname.value == null) {
			client_lastname.classList.add('is-invalid');
			if (!notValidated.includes(2)) {	 
				notValidated.push(2);
			}
		} else {
			client_lastname.classList.remove('is-invalid');			
			client_lastname.classList.add('is-valid');
			removeA(notValidated, 2);
		}	
	});

	const id_type = document.getElementById('id_type');
	id_type.addEventListener('change', () => {
		if(id_type.value === ''){
			id_type.classList.add('is-invalid');
			if (!notValidated.includes(3)) {
				notValidated.push(3);
			}
		}else {
			id_type.classList.remove('is-invalid');
			id_type.classList.add('is-valid');
			removeA(notValidated, 3);
		}
	});

	const client_ci = document.getElementById('ci');
	client_ci.addEventListener('keyup', () => {
		if (reg.test(client_ci.value) == false || client_ci.value === '' || client_ci.value == null ||  client_ci.value.length > 9 || client_ci.value.length < 7) {
			client_ci.classList.add('is-invalid');
			if (!notValidated.includes(4)) {
				notValidated.push(4);
			}
		} else {
			client_ci.classList.remove('is-invalid');
			client_ci.classList.add('is-valid');
			removeA(notValidated, 4);			
		}
	})

	const number_code = document.getElementById('number_code');
	number_code.addEventListener('change', () => {
		if (number_code.value === '' || number_code.value == null) {
			number_code.classList.add('is-invalid');
			if (!notValidated.includes(5)) {
				notValidated.push(5);
			}
		}else {
			number_code.classList.remove('is-invalid');
			number_code.classList.add('is-valid');
			removeA(notValidated, 5);			
		}
	})

	const client_phone = document.getElementById('client_phone');
	client_phone.addEventListener('keyup', () => {
		if (reg.test(client_phone.value) == false || client_phone.value === '' || client_phone.value == null ||  client_phone.value.length > 8 || client_phone.value.length < 7){
			client_phone.classList.add('is-invalid');
			if (!notValidated.includes(6)) {
				notValidated.push(6);
			}		
		}else {
			client_phone.classList.remove('is-invalid');
			client_phone.classList.add('is-valid');
			removeA(notValidated, 6);			
		}
	})

	const client_email = document.getElementById('client_email');
	client_email.addEventListener('keyup', () => {
		if (emailReg.test(client_email.value) == false || client_email === "" || client_email == null) {
			client_email.classList.add('is-invalid');
			if (!notValidated.includes(7)) {
				notValidated.push(7);
			}
		}else {
			client_email.classList.remove('is-invalid');
			client_email.classList.add('is-valid');
			removeA(notValidated, 7);
		}
	});

	const vehicle_brand = document.getElementById('brand');
	vehicle_brand.addEventListener('change', () => {
		if(vehicle_brand.value === '' || vehicle_brand.value == null){
			vehicle_brand.classList.add('is-invalid');
			if (!notValidated.includes(8)) {
				notValidated.push(8);
			}

		}else {
			vehicle_brand.classList.remove('is-invalid');
			vehicle_brand.classList.add('is-valid');
			removeA(notValidated, 8);
		}
	})

	const vehicle_model = document.getElementById('model');
	vehicle_model.addEventListener('change', () => {
		if(vehicle_model.value === '' || vehicle_model.value == null){
			vehicle_model.classList.add('is-invalid');
			if (!notValidated.includes(9)) {
				notValidated.push(9);
			}
		}else {
			vehicle_model.classList.remove('is-invalid');
			vehicle_model.classList.add('is-valid');
			removeA(notValidated, 9);
		}
	})

	const vehicle_year = document.getElementById('vehicle_year');
	vehicle_year.addEventListener('keyup', () => {
		if (vehicle_year.value > 2100 || vehicle_year.value < 1920 || vehicle_year.value === "" || vehicle_year.value == null) {
			vehicle_year.classList.add('is-invalid');
			if (!notValidated.includes(10)) {
				notValidated.push(10);
			}
		}else {
			vehicle_year.classList.remove('is-invalid');
			vehicle_year.classList.add('is-valid');
			removeA(notValidated, 10);			
		}
	})

	const vehicle_type = document.getElementById('type');
	vehicle_type.addEventListener('keyup', () => {
		if (vehicle_type.value === "" || vehicle_type.value == null) {
			vehicle_type.classList.add('is-invalid');
			if (!notValidated.includes(11)) {
				notValidated.push(11);
			}
		}else {
			vehicle_type.classList.remove('is-invalid');
			vehicle_type.classList.add('is-valid');
			removeA(notValidated, 11);			
		}
	})

	const vehicle_color = document.getElementById('vehicle_color');
	vehicle_color.addEventListener('keyup', () => {
		if (vehicle_color.value === "" || vehicle_color.value == null) {
			vehicle_color.classList.add('is-invalid');
			if (!notValidated.includes(12)) {
				notValidated.push(12);
			}
		}else {
			vehicle_color.classList.remove('is-invalid');
			vehicle_color.classList.add('is-valid');
			removeA(notValidated, 12);			
		}
	})

	const vehicle_use = document.getElementById('used_for');
	vehicle_use.addEventListener('change', () => {
		if(vehicle_use.value === '' || vehicle_use.value == null){
			vehicle_use.classList.add('is-invalid');
			if (!notValidated.includes(13)) {
				notValidated.push(13);
			}
		}else {
			vehicle_use.classList.remove('is-invalid');
			vehicle_use.classList.add('is-valid');
			removeA(notValidated, 13);
		}
	})

	const vehicle_bodywork_serial = document.getElementById('vehicle_bodywork_serial');
	vehicle_bodywork_serial.addEventListener('keyup', () => {
		if (vehicle_bodywork_serial.value === "" || vehicle_bodywork_serial.value == null) {
			vehicle_bodywork_serial.classList.add('is-invalid');
			if (!notValidated.includes(14)) {
				notValidated.push(14);
			}
		}else {
			vehicle_bodywork_serial.classList.remove('is-invalid');
			vehicle_bodywork_serial.classList.add('is-valid');
			removeA(notValidated, 14);			
		}
	})

	const vehicle_motor_serial = document.getElementById('vehicle_motor_serial');
	vehicle_motor_serial.addEventListener('keyup', () => {
		if (vehicle_motor_serial.value === "" || vehicle_motor_serial.value == null) {
			vehicle_motor_serial.classList.add('is-invalid');
			if (!notValidated.includes(15)) {
				notValidated.push(15);
			}
		}else {
			vehicle_motor_serial.classList.remove('is-invalid');
			vehicle_motor_serial.classList.add('is-valid');
			removeA(notValidated, 15);			
		}
	})

	const vehicle_certificate_number = document.getElementById('vehicle_certificate_number');
	vehicle_certificate_number.addEventListener('keyup', () => {
		if (vehicle_certificate_number.value === "" || vehicle_certificate_number.value == null) {
			vehicle_certificate_number.classList.add('is-invalid');
			if (!notValidated.includes(16)) {
				notValidated.push(16);
			}
		}else {
			vehicle_certificate_number.classList.remove('is-invalid');
			vehicle_certificate_number.classList.add('is-valid');
			removeA(notValidated, 16);			
		}
	})

	const vehicle_weight = document.getElementById('vehicle_weight');
	vehicle_weight.addEventListener('keyup', () => {
		if (reg.test(vehicle_weight.value) == false || vehicle_weight.value === "" || vehicle_weight.value == null) {
			vehicle_weight.classList.add('is-invalid');
			if (!notValidated.includes(17)) {
				notValidated.push(17);
			}
		}else {
			vehicle_weight.classList.remove('is-invalid');
			vehicle_weight.classList.add('is-valid');
			removeA(notValidated, 17);			
		}
	})

	const vehicle_registration = document.getElementById('vehicle_registration');
	vehicle_registration.addEventListener('keyup', () => {
		if (vehicle_registration.value === "" || vehicle_registration.value == null) {
			vehicle_registration.classList.add('is-invalid');
			if (!notValidated.includes(18)) {
				notValidated.push(18);
			}
		}else {
			vehicle_registration.classList.remove('is-invalid');
			vehicle_registration.classList.add('is-valid');
			removeA(notValidated, 18);			
		}
	})

	const price = document.getElementById('price');
	price.addEventListener('change', () => {
		if(price.value === '' || price.value == null){
			price.classList.add('is-invalid');
			if (!notValidated.includes(19)) {
				notValidated.push(19);
			}
		}else {
			price.classList.remove('is-invalid');
			price.classList.add('is-valid');
			removeA(notValidated, 19);
		}
	})	

	form.addEventListener('submit', (e) => {
		if (notValidated.length > 0) {
			e.preventDefault();
		}
	})
</script>
@endsection