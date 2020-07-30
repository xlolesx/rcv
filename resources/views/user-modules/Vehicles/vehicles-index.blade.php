@extends('layouts.user-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Vehiculos</h6>
		<a class="btn btn-success float-right" href="{{ route('user.register.vehicle')}}">Registrar Vehiculo</a>
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
					</tr>
			  @endif
			  @endforeach
			</tbody>

		</table>
	</div>
</div>
</div>				
@endsection


