@extends('layouts.admin-modules')

@section('module')
<div class="card">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link bg-dark active" href="/admin/admin-exportpdf/{{$policy->id}}">Exportar PDF</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2 bg-warning text-dark active" href="/admin/edit-policy/{{$policy->id}}">Editar Poliza</a>
      </li>
      <li class="nav-item">
        <form action="/admin/delete-policy/{{$policy->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="nav-link ml-2 btn btn-danger">Eliminar</button>  
        </form>
      </li>
      <li class="nav-item ml-auto">
        <a href="{{route('index.policies')}}" class="nav-link bg-danger active">X</a> 
      </li>
    </ul>
  </div>

  <div class="card-body">
   <h3 class="card-title text-center">Datos de Afiliación</h3>
   <div class="row border-bottom border-dark mb-4">
    <div class="col-4 text-center">
      <h6><span class="font-weight-bold mr-2">Número de afilición: </span>{{$policy->id}}</h6>  
    </div>
    <div class="col-4 text-center">
      <h6><span class="font-weight-bold mr-2">Emisión: </span>{{\Carbon\Carbon::parse($policy->created_at)->format('d-m-Y')}}</h6>     
    </div>
    <div class="col-4 text-center">
      <h6><span class="font-weight-bold mr-2">Vencimiento: </span>
        @if($expiring_date > $today)
        <span class="text-success">{{\Carbon\Carbon::parse($policy->expiring_date)->format('d-m-Y')}}</h6>     
        </span>
        @elseif($expiring_date == $today)
        <span class="text-warning">{{\Carbon\Carbon::parse($policy->expiring_date)->format('d-m-Y')}}</h6>     
        </span>
        @elseif($expiring_date < $today)
        <span class="text-danger">{{\Carbon\Carbon::parse($policy->expiring_date)->format('d-m-Y')}}</h6>     
        </span>
        @endif
      </div>
    </div>

    <h3 class="card-title text-center">Datos del Vendedor</h3>
    <div class="row border-bottom border-dark mb-4">
      <div class="col-4 text-center">
        @if(isset($policy->user_id))
        <h6><span class="font-weight-bold mr-2">Contratante: </span>{{$policy->user->name . " " . $policy->user->lastname}}</h6>
        @else
        <h6><span class="font-weight-bold mr-2">Contratante: </span>Administrador</h6>
        @endif
      </div>
      <div class="col-4 text-center">
        @if(isset($policy->user_id))
        <h6><span class="font-weight-bold mr-2">Rif/Cedula: </span>{{$policy->user->ci}}</h6>
        @else
        <h6><span class="font-weight-bold mr-2">Rif/Cedula: </span>Administrador</h6>
        @endif
      </div>
      <div class="col-4 text-center">
        @if(isset($policy->user_id))
        <h6><span class="font-weight-bold mr-2">Teléfono: </span>{{$policy->user->phone_number}}</h6>     
        @else
        <h6><span class="font-weight-bold mr-2">Teléfono: </span>Administrador</h6>     
        @endif
      </div>
    </div>

    <h3 class="card-title text-center">Datos del Beneficiario</h3>
    <div class="row border-bottom border-dark mb-4">
      <div class="col-3 text-center">
        <h6><span class="font-weight-bold mr-2">Benificiario: </span>{{$policy->client_name. " " .$policy->client_lastname}}</h6>  
      </div>
      <div class="col-3 text-center">
        <h6><span class="font-weight-bold mr-2">Rif/Cédula: </span>{{$policy->client_ci}}</h6>     
      </div>
      <div class="col-3 text-center">
        <h6><span class="font-weight-bold mr-2">Teléfono: </span>{{'0'.$policy->client_phone}}</h6>     
      </div>
      <div class="col-3 text-center">
        <h6><span class="font-weight-bold mr-2">Email: </span>{{$policy->client_email}}</h6>     
      </div>
    </div>

    <h3 class="card-title text-center">Datos del Vehiculo</h3>
    <div class="row border-bottom border-dark mb-4">
      <div class="col-6 text-center border-right border-dark">
        <h6><span class="font-weight-bold mr-2">Marca: </span>{{$policy->vehicle_brand}}</h6>     
        <h6><span class="font-weight-bold mr-2">Modelo: </span>{{$policy->vehicle_model}}</h6>     
        <h6><span class="font-weight-bold mr-2">Tipo: </span>{{$policy->type}}</h6>     
        <h6><span class="font-weight-bold mr-2">Año: </span>{{$policy->vehicle_year}}</h6>     
        <h6><span class="font-weight-bold mr-2">Color: </span>{{$policy->vehicle_color}}</h6>     
        <h6><span class="font-weight-bold mr-2">Peso: </span>{{$policy->vehicle_weight}}</h6>     
      </div>
      <div class="col-6 text-center">
        <h6><span class="font-weight-bold mr-2">Número de certificado: </span>{{$policy->vehicle_certificate_number}}</h6>     
        <h6><span class="font-weight-bold mr-2">Placa: </span>{{$policy->vehicle_registration}}</h6>
        <h6><span class="font-weight-bold mr-2">Serial motor: </span>{{$policy->vehicle_motor_serial}}</h6>
        <h6><span class="font-weight-bold mr-2">Serial de carroceria: </span>{{$policy->vehicle_bodywork_serial}}</h6>     
        <h6><span class="font-weight-bold mr-2">Uso: </span>{{$policy->used_for}}</h6>
      </div>
    </div>

    <h3 class="card-title text-center">Descripción Póliza</h3>
    <h5 class="card-subtitle text-center mt-2">{{$policy->price->description}}</h5>
    <div class="row border-bottom border-dark mb-4">
      <div class="col-6 text-center border-right border-dark">
        <h6><span class="font-weight-bold mr-2">Daños a cosas: </span><span class="prices_se">{{$policy->price->damage_things}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Daños a personas: </span><span class="prices_se">{{$policy->price->damage_people}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Asistencia jurídica: </span><span class="prices_se">{{$policy->price->legal_assistance}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Muerte: </span><span class="prices_se">{{$policy->price->death}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Invalidez: </span><span class="prices_se">{{$policy->price->disability}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Gastos médicos: </span><span class="prices_se">{{$policy->price->medical_expenses}}</span> Bs.S</h6>  
        @if($policy->price->crane == 0)
        <h6><span class="font-weight-bold mr-2">Grua: </span>No aplica</h6>
        @else
        <h6><span class="font-weight-bold mr-2">Grua: </span><span class="prices_se">{{$policy->price->crane}}</span>Bs.S</h6>
        @endif       
        <h6 class="mt-4"><span class="font-weight-bold mr-2">Total Cobertura: </span>{{$policy->price->total_all}}</h6>
      </div>
      <div class="col-6 text-center">
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$policy->price->premium1}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$policy->price->premium2}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$policy->price->premium3}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$policy->price->premium4}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$policy->price->premium5}}</span> Bs.S</h6>     
        <h6><span class="font-weight-bold mr-2">Prima: </span><span class="prices_se">{{$policy->price->premium6}}</span> Bs.S</h6>
        <h6 class="mt-5"><span class="font-weight-bold mr-2">Total Prima: </span><span class="prices_se">{{$policy->price->total_premium}}</span> Bs.S</h6>     
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <span class="btn btn-block btn-warning" id="openModal" data-toggle="modal" data-target="{{'#'."modal-".$policy->id}}">Renovar Póliza</span>
      </div>
    </div>
  </div>
</div>  

<div class="modal fade" id="modal-{{$policy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea renovar la fecha de vencimiento de esta poliza?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Seleccione "continuar" si desea renovar esta poliza</div>
                <div class="modal-footer">
                  <form action="/admin/renew-policy/{{$policy->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Continuar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

@endsection

@section('scripts')
<script>
  let objects = document.getElementsByClassName('prices_se');

  $(document).ready(function() {
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