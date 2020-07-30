@extends('layouts.admin-modules')

@section('module')

<div class="container mt-3 mb-3">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Cambio de contraseña</div>

				<div class="card-body">
					<form method="POST" action="/admin/edit-user/password/{{$id}}">
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
</div>

@endsection