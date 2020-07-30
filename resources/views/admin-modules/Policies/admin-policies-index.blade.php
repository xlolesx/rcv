@extends('layouts.admin-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Pólizas</h6>
		<a class="btn btn-success float-right" href="{{ route('register.policy')}}">Registrar Poliza</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Num. Afiliación</th>
						<th>Vendedor</th>
						<th>Num. Telefono</th>
						<th>Cliente</th>
						<th>Cédula</th>
						<th>Fecha de emisión</th>
						<th>Estatus</th>
						<th>Acciones</th>	    
					</tr>
				</thead>
				<tbody>
					@foreach($policies as $policy)
					@if(!$policy->deleted_at)
					<tr>
						<td>{{$policy->id}}</td>
						@if(isset($policy->admin_id))
						<td>Administrador</td>
						@else
						<td>{{$policy->user->name.' '.$policy->user->lastname}}</td>
						@endif
						@if(isset($policy->admin_id))
						<td>Administrador</td>
						@else
						<td>{{$policy->client_phone}}</td>
						@endif
						<td>{{$policy->client_name}}</td>
						<td>{{$policy->client_ci}}</td>
						<td>{{ \Carbon\Carbon::parse($policy->created_at)->format('d-m-Y')}}</td>
						@if(Carbon\Carbon::parse($policy->expiring_date) > $today)
						<td class="text-success">Vigente</td>
						@elseif(Carbon\Carbon::parse($policy->expiring_date) == $today)
						<td class="text-warning">Vence Hoy</td>
						@else
						<td class="text-danger">Vencido</td>
						@endif
						<td class="p-0">
							<a href="/admin/index-policy/{{$policy->id}}" class="btn bg-transparent action-button pr-3 mt-1" style="width: 5px; color: #f2a413;"><i class="fas fa-eye"></i></a>
							<a href="/admin/edit-policy/{{$policy->id}}" class="btn bg-transparent text-primary action-button pr-3 mt-1" style="width: 5px;"><i class="fas fa-edit"></i></a>
							{{-- Button to open delete modal --}}
							<span class="btn bg-transparent text-danger pr-4" id="openModal" data-toggle="modal" data-target="{{'#'."deleteModal-".$policy->id}}" style="width: 5px;"><i class="fas fa-trash-alt"></i></span>
						</td>
					</tr>
					@endif
					<div class="modal fade" id="deleteModal-{{$policy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea <strong class="text-danger">eliminar</strong> esta poliza?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Seleccione "continuar" si desea <span class="text-danger">eliminar</span> esta poliza</div>
								<div class="modal-footer">
									<form action="/admin/delete-policy/{{$policy->id}}" method="POST">
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