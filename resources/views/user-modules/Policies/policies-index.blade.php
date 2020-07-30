@extends('layouts.user-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Pólizas</h6>
		<a class="btn btn-success float-right" href="{{ route('user.register.policy')}}">Registrar Poliza</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Creador</th>
						<th>Fecha de creacion</th>
						<th>Fecha de vencimiento</th>
						<th>Estatus</th>		      
						<th>Acciones</th>	    
					</tr>
				</thead>
				<tbody>
					@foreach($policies as $policy)
					@if(!$policy->deleted_at)
					<tr>
						<td>{{$policy->id}}</td>
						<td>{{$policy->user->name.' '.$policy->user->lastname}}</td>
						{{-- <td>{{\App\Office::where(['id' => $policy->user_id])->pluck('office_address')[0]}}</td> --}}
						<td>{{ \Carbon\Carbon::parse($policy->created_at)->format('d-m-Y')}}</td>
						<td>{{ \Carbon\Carbon::parse($policy->expiring_date)->format('d-m-Y')}}</td>
						@if(Carbon\Carbon::parse($policy->expiring_date) > $today)
						<td class="text-success">Vigente</td>
						@elseif(Carbon\Carbon::parse($policy->expiring_date) == $today)
						<td class="text-warning">Vence Hoy</td>
						@else
						<td class="text-danger">Vencido</td>
						@endif			      
						<td class="justify-content-center">
							<a href="/user/index-policy/{{$policy->id}}" class="btn btn-primary">Ver</a>
							<a href="/user/user-exportpdf/{{$policy->id}}" class="btn btn-dark">Exportar PDF</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>				
@endsection