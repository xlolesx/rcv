@extends('layouts.user-modules')

@section('module')
<div class="card shadow mb-4">
	<div class="card-header py-2">
		<h6 class="m-0 font-weight-bold text-primary d-inline-block py-2">Consultas de pago</h6>
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
						<td><span class="prices_se">{{$payment->totalca}}</span> Bs.S</td>
						<td><span class="prices_se">{{$payment->totalm}}</span> Bs.S</td>
						<td><span class="prices_se">{{$payment->total}}</span> Bs.S</td>
						<td><span class="prices_se">{{$payment->total_payment}}</span> Bs.S</td>
						@if($payment->bill == 'Sin comprobante')
						<td>No hay comprobante disponible</td>
						@else
						<?php $extension = pathinfo(public_path($payment->bill), PATHINFO_EXTENSION)?>
						@if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
						<td>
							<span class="btn btn-primary" id="openModal" onclick="openImg('imgModal-{{$payment->id}}')">Ver</span>
						</td>
						@else
						<td>
							<a href="{{Storage::url($payment->bill)}}" class="btn btn-primary text-white">Ver</a>
						</td>
						@endif
						@endif

					</tr>

					<div id="imgModal-{{$payment->id}}" class="modal">
						<div class="card w-50 modalContent">
							<img src="{{Storage::url($payment->bill)}}" class="card-img-top" alt="...">
							<div class="card-body" style="background: white;">
								<span class="d-block w-25 btn btn-danger m-auto" id="closeImgBtn" onclick="closeImgModal()">Cerrar</span>
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
<script type="text/javascript">
	var closeBtn = document.getElementById('closeBtn');

	// modalBtn.addEventListener('click', openModal);
	window.addEventListener('click', clickOutside);

	//open imgModal
	let thismodal;
	function openImg(id){
		let imgModal = document.getElementById(id);	
		imgModal.style.display = 'block';
		thismodal = imgModal;
		return thismodal;
	}

	function closeImgModal(){
		thismodal.style.display = 'none';
	}

	function clickOutside(e){
		if(e.target == thismodal){		
			thismodal.style.display = 'none';
		}
	}
</script>
<script>
	$(document).ready(function() {
		$("tbody").find('tr').each(function() {
			let objects = $(this).find('span.prices_se');
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