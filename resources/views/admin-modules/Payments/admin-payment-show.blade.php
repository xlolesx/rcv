@extends('layouts.admin-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Pólizas</h6>
		<a class="btn btn-success float-right" href="{{ route('register.policy')}}">Registrar Poliza</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px;">
				<thead>
					<tr>
						<th>Vendedor</th>
						<th>Oficina</th>
						<th>Desde</th>
						<th>Hasta</th>
						<th>Total monto carros</th>
						<th>Total monto motos</th>
						<th>Total</th>
						<th>Total pagado</th>
						<th>Comprobante</th>
					</tr>
				</thead>
				<tbody>
					@foreach($payments as $payment)
					<tr>
						<td>{{$payment->name}}</td>
						<td>{{$payment->office}}</td>
						<td>{{\Carbon\Carbon::parse($payment->from)->format('d-m-Y')}}</td>
						<td>{{\Carbon\Carbon::parse($payment->until)->format('d-m-Y')}}</td>
						<td><span class="prices_ce">{{$payment->totalca}}</span> Bs.S</td>
						<td><span class="prices_ce">{{$payment->totalm}}</span> Bs.S</td>
						<td><span class="prices_ce">{{$payment->total}}</span> Bs.S</td>
						<td><span class="prices_ce">{{$payment->total_payment}}</span> Bs.S</td>
						@if($payment->bill == "Sin comprobante")
						<td>
							<span class="btn btn-primary" id="openModal" data-toggle="modal" data-target="{{'#'."modal".$payment->id}}">Adjuntar</span>
						</td>
						@else
						<?php $extension = pathinfo(public_path($payment->bill), PATHINFO_EXTENSION)?>
						@if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
						<td>
							<span class="btn btn-primary" id="openModal" data-toggle="modal" data-target="{{'#'."imgModal-".$payment->id}}">Ver</span>
						</td>
						@else
						<td>
							<a href="{{Storage::url($payment->bill)}}" class="btn btn-primary text-white">Ver</a>
						</td>
						@endif
						@endif
					</tr>

					<div id="modal-{{$payment->id}}" class="modal">
						<div class="card w-50 modalContent">
							<span class="d-block btn btn-danger ml-auto text-center mb-2" id="closeBtn" onclick="closeModal()" style="width: 40px;">X</span>
							<form action="/admin/update-payment/{{$payment->id}}" method="POST" enctype="multipart/form-data">
								@csrf	
								<div class="form-group">
									<input type="hidden" name="_method" value="PUT">
									<input  type="file" class="d-block mb-2 ml-5 @error('bill') is-invalid @enderror" name="bill" required>

									@error('bill')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

									<div class="card-body mb-4 ">
										<p class="text-danger"><strong>Nota: Solo se pueden adjuntar formatos de imagen y pdf.</strong></p>
									</div>

									<button type="submit" class="d-block w-25 btn btn-success m-auto">Adjuntar</button>
								</div>
							</form>
						</div>
					</div>

					{{-- Modal Attach --}}
					<div class="modal fade text-center" id="{{"modal".$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Adjuntar Comprobante</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Solo pueden seleccionar formatos de imagen y pdf</div>
								<div class="modal-footer">

									<form id="logout-form" action="/admin/update-payment/{{$payment->id}}" method="POST" enctype="multipart/form-data" style="display: none;">
										@csrf
										<div class="form-group">
											<input type="hidden" name="_method" value="PUT">
											<input  type="file" class="d-block mb-2 ml-5 @error('bill') is-invalid @enderror" name="bill" required>

											@error('bill')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror

										</div>
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary">Adjuntar</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade text-center" id="{{"imgModal-".$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Mostrar comprobante</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<img src="{{Storage::url($payment->bill)}}" class="card-img-top" alt="...">
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
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

@section('scripts')
<script>
$(document).ready(function() {
	$("tbody").find('tr').each(function() {
		let objects = $(this).find('span.prices_ce');
		console.log(objects);
		for(object of objects){
			console.log(object.innerText);
			object.innerText = number_format(object.innerText);
		}
	})
});

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
  	var k = Math.pow(10, prec);
  	return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
  	s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
  	s[1] = s[1] || '';
  	s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
</script>
@endsection