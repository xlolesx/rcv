@extends('layouts.admin-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Registro de Actividad</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table text-center" id="dataTable" width="100%" cellspacing="0">
				<thead style="display: none;">
					<td>x</td>
					<td>x</td>
					<td>x</td>
					<td>x</td>
				</thead>
				<tbody>
					@foreach($activities as $activity)
					<tr>
						<td>{{$activity->log_name}}</td>
						@if($activity->description === 'created')
						<td class="text-success"><i class="fas fa-plus"></i></td>
						@elseif($activity->description === 'updated')
						<td class="text-primary"><i class="fas fa-circle"></i></td>
						@elseif($activity->description === 'deleted')
						<td class="text-danger"><i class="fas fa-times"></i></td>
						@elseif($activity->description === 'Exitoso')
						<td class="text-success">Exitoso</td>
						@else
						<td>error</td>
						@endif
						<td>{{$activity->user->name}}</td>
						<td>{{ \Carbon\Carbon::parse($activity->created_at)->format('d-m-Y')}}</td>
					</tr>
					@endforeach
 				</tbody>
			</table>
		</div>
	</div>
</div>				
@endsection