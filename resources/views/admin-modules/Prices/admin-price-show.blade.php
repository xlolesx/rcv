@extends('layouts.admin-modules')

@section('module')
<div class="card">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link ml-2 bg-warning text-dark active" href="/admin/edit-price/{{$price->id}}">Editar Precio</a>
      </li>
      <li class="nav-item">
        <form action="/admin/delete-price/{{$price->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="nav-link ml-2 btn btn-danger">Eliminar</button>  
        </form>
      </li>
    </ul>
  </div>

  <div class="card-body">
    <h3 class="card-title text-center">Descripción Póliza</h3>
    <div class="row border-bottom border-dark mb-4">
      <div class="col-6 text-center border-right border-dark">
        <h6><span class="font-weight-bold mr-2">Daños a cosas: </span><span class="prices_se">{{$price->damage_things}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Daños a personas: </span><span class="prices_se">{{$price->damage_people}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Asistencia jurídica: </span><span class="prices_se">{{$price->legal_assistance}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Muerte: </span><span class="prices_se">{{$price->death}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Invalidez: </span><span class="prices_se">{{$price->disability}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Gastos médicos: </span><span class="prices_se">{{$price->medical_expenses}}</span> Bs.S</h6>  
        @if($price->crane == 0)
        <h6><span class="font-weight-bold mr-2">Grua: </span>No aplica</h6>
        @else
        <h6><span class="font-weight-bold mr-2">Grua: </span><span class="prices_se">{{$price->crane}}</span> Bs.S</h6>
        @endif       
        <h6 class="mt-4"><span class="font-weight-bold mr-2">Total Cobertura: </span><span class="prices_se">{{$price->total_all}}</span> Bs.S</h6>
      </div>
      <div class="col-6 text-center">
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$price->premium1}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$price->premium2}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$price->premium3}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$price->premium4}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$price->premium5}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$price->premium6}}</span> Bs.S</h6>
        <h6 class="mt-5"><span class="font-weight-bold mr-2">Total Prima: </span><span class="prices_se">{{$price->total_premium}}</span> Bs.S</h6>     
      </div>
    </div>



    <a href="{{url()->previous()}}" class="btn btn-danger active">Volver</a>
  </div>
</div>  

@endsection

@section('scripts')
<script>
  let objects = document.getElementsByClassName('price_show');

  $().ready(function() {
    for(object of objects){
      console.log(object.innerText);
      object.innerText = number_format(object.innerText);
    }
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