@extends('layouts.admin-modules')

@section('module')

<div class="container mt-3 mb-3">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Cambio de contraseña</div>

				<div class="card-body">
					<form method="POST" action="/admin/change-password/{{$id}}" id="CPF">
						@csrf
						<input type="hidden" name="_method" value="PUT">

						<div class="form-group col-md-12">
							<label for="password" class="col-form-label text-md-right">Nueva Contraseña</label>
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off-password">
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div class="form-group col-md-12">
							<label for="password-confirm" class="col-form-label text-md-right">Confirmar Contraseña</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off-password">
						</div>

						<div class="form-group row mb-0 mt-2">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary ">
									Cambiar contraseña
								</button>

								<a href="{{ route('admin') }}" class="btn btn-danger" style="width: 90px;">
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
</div>

@endsection

@section('scripts')
<script>
	const form = document.getElementById('CPF');
	const p = document.getElementById('password');
	const pc = document.getElementById('password-confirm');
	let notValidated = [1, 2];

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


	p.addEventListener('keyup', () => {
		if (p.value === "" || p.value == null || p.value.length < 8) {
			p.classList.add('is-invalid');
			if (!notValidated.includes(1)) {     
				notValidated.push(1);
			}
			console.log(notValidated);
		} else {
			p.classList.remove('is-invalid');         
			p.classList.add('is-valid');
			removeA(notValidated, 1);
		}               
	})

	pc.addEventListener('keyup', () => {
		if (pc.value === "" || pc.value == null || pc.value !== p.value || pc.value.length < 8) {
			pc.classList.add('is-invalid');
			if (!notValidated.includes(2)) {     
				notValidated.push(2);
			}
			console.log(notValidated);

		} else {
			pc.classList.remove('is-invalid');         
			pc.classList.add('is-valid');
			removeA(notValidated, 2);
		}               
	})

	form.addEventListener('submit', (e) => {
		if (notValidated.length > 0) {
			e.preventDefault();
		}
	})
</script>
@endsection