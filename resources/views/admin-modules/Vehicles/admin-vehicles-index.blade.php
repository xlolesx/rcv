@extends('layouts.admin-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Vehículos</h6>
		<a class="btn btn-success float-right" href="{{ route('register.vehicle')}}">Registrar Vehiculo</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tipo de Vehiculo</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Acciones</th>	    
					</tr>
				</thead>
				<tbody>
					@foreach($vehicles as $vehicle)
					@if(!$vehicle->deleted_at)
					<tr>
						<td>{{$vehicle->id}}</td>
						@if($vehicle->vehicle_type == 0)
						<td>Vehiculo de cuatro ruedas</td>
						@else
						<td>Vehiculo de dos ruedas</td>
						@endif
						<td>{{$vehicle->brand}}</td>
						<td>{{$vehicle->model}}</td>
						<td class="text-center">	
							<a href="/admin/edit-vehicle/{{$vehicle->id}}" class="btn bg-transparent text-primary pr-4" style="width: 5px;"><i class="fas fa-edit"></i></a>
							{{-- Button to open the modal --}}
							<span class="btn bg-transparent text-danger pr-4" id="openModal" data-toggle="modal" data-target="{{'#'."deleteModal-".$vehicle->id}}" style="width: 5px;"><i class="fas fa-trash-alt"></i></span>
						</td>
					</tr>
					@endif
					<div class="modal fade" id="deleteModal-{{$vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea <strong class="text-danger">eliminar</strong> este vehiculo?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Seleccione "continuar" si desea <span class="text-danger">eliminar</span> este vehiculo</div>
								<div class="modal-footer">
									<form action="/admin/delete-vehicle/{{$vehicle->id}}" method="POST">
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