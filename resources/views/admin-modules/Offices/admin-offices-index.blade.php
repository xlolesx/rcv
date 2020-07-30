@extends('layouts.admin-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Oficinas</h6>
		<a class="btn btn-success float-right" href="{{ route('register.office')}}">Registrar oficina</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						{{-- <th scope="col">ID</th> --}}
						<th scope="col">Direccion</th>
						<th scope="col">Estado</th>
						<th scope="col">Municipio</th>
						<th scope="col">Parroquia</th>
						<th scope="col">Acciones</th>

					</tr>
				</thead>
				<tbody>
					@foreach($offices as $office)
					@if(!$office->deleted_at)
					<tr>
						{{-- <th scope="row">{{$counter = $counter + 1}}</th> --}}
						<td>{{$office->office_address}}</td>
						<td>{{$office->estado->estado}}</td>
						<td>{{$office->municipio->municipio}}</td>
						<td>{{$office->parroquia->parroquia}}</td>
						<td>
							<a href="/admin/edit-office/{{$office->id}}" class="btn bg-transparent text-primary pr-4" style="width: 5px;"><i class="fas fa-edit"></i></a>
							<span class="btn bg-transparent text-danger pr-4" id="openModal" data-toggle="modal" data-target="{{'#'."deleteModal-".$office->id}}" style="width: 5px;"><i class="fas fa-trash-alt"></i></span>
						</td>
					</tr>
					@endif
					<div class="modal fade" id="deleteModal-{{$office->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea <strong class="text-danger">eliminar</strong> esta oficina?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Seleccione "continuar" si desea <span class="text-danger">eliminar</span> esta oficina</div>
								<div class="modal-footer">
									<form action="/admin/delete-office/{{$office->id}}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary">Continuar</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					@endforeach
				</tbody>

			</table>
		</div>
	</div>
</div>				
@endsection