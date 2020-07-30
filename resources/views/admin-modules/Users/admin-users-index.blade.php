@extends('layouts.admin-modules')

@section('module')
<a class="btn btn-light shadow" href="{{ route('index.users.admins')}}">Ver usuarios administradores</a>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Usuarios</h6>
		<a class="btn btn-success float-right mb-2" href="{{ route('register')}}">Registrar Usuario</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Vendedor</th>
						<th scope="col">Cedula</th>
						<th scope="col">Oficina</th>
						<th scope="col">Fecha de Ingreso</th>
						<th scope="col">Acciones</th>	    
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					@if(!$user->deleted_at)
					<tr>
						{{-- <th scope="row">{{$counter = $counter + 1}}</th> --}}
						<td>{{$user->id}}</td>
						<td>{{$user->name.' '.$user->lastname}}</td>
						<td>{{$user->ci}}</td>
						<td>{{$user->office->office_address}}</td>
						<td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
						<td class="text-center">
							<a href="/admin/index-user/{{$user->id}}" class="btn bg-transparent pr-4" style="width: 5px; color: #f2a413;"><i class="fas fa-eye"></i></a>
							<a href="/admin/edit-user/{{$user->id}}" class="btn bg-transparent text-primary pr-4" style="width: 5px;"><i class="fas fa-edit"></i></a>
							<a href="/admin/activity-log/user/{{$user->id}}" class="btn bg-transparent text-success pr-4" style="width: 5px;"><i class="fas fa-clipboard-list"></i></a>
							<span class="btn bg-transparent text-danger pr-4" id="openModal" data-toggle="modal" data-target="{{'#'."deleteModal-".$user->id}}" style="width: 5px;"><i class="fas fa-trash-alt"></i></span>
						</td>
					</tr>
					@endif
					<div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea <strong class="text-danger">eliminar</strong> este usuario?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Seleccione "continuar" si desea <span class="text-danger">eliminar</span> este usuario</div>
								<div class="modal-footer">
									<form action="/admin/delete-user/{{$user->id}}" method="POST">
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