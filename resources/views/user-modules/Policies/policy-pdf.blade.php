<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PDF - Poliza</title>
</head>

<style>
  *{
    font-family: arial, "sans-serif";
    font-size: 11px;
  }

  table, th, td{
    padding: 5px;
    border-bottom: 1px solid black;
    border-collapse: collapse;
  }

  .vp-table .right-bd{
    border-right: 1px solid black;
  }

  .vp-table .rid-bb{
    border-bottom: none;
  }

  .vp-table .end-vp{
    border-bottom: 1px solid black;
  }

</style>

<body>

  <table style="width:100%">
    <caption><h1>Datos de Afiliación:</h1></caption>
    <tr style="text-align:center;">
      <td style="width: 33%;"><strong>Número de afilición: </strong>{{$policy->id}}</td>
      <td style="width: 33%;"><strong>Emision: </strong>{{\Carbon\Carbon::parse($policy->created_at)->format('d-m-Y')}}</td>
      <td style="width: 33%;"><strong>Vencimiento: </strong>{{\Carbon\Carbon::parse($policy->expiring_date)->format('d-m-Y')}}</td>
    </tr>   
  </table> 

  <table style="width:100%; margin-top: 12px;">
    <caption><h1>Datos del vendedor:</h1></caption>
    <tr style="text-align:center;">
      @if(isset($policy->user_id))
      <td style="width: 33%;"><strong>Contratante: </strong>{{$policy->user->name . " " . $policy->user->lastname}}</td>
      @else
      <td style="width: 33%;"><strong>Contratante: </strong>Administrador</td>
      @endif
      @if(isset($policy->user_id))
      <td style="width: 33%;"><strong>Rif/Cedula: </strong>{{$policy->user->ci}}</td>
      @else
      <td style="width: 33%;"><strong>Rif/Cedula: </strong>Administrador</td>
      @endif
      @if(isset($policy->user_id))
      <td style="width: 33%;"><strong>Teléfono: </strong>{{$policy->user->phone_number}}</td>
      @else
      <td style="width: 33%;"><strong>Teléfono: </strong>Administrador</td>
      @endif
    </tr>   
  </table> 

  <table style="width:100%; margin-top: 12px;">
    <caption><h1>Datos del beneficiario:</h1></caption>
    <tr style="text-align:center;">
      <td style="width: 25%;"><strong>Benificiario: </strong>{{$policy->client_name. " " .$policy->client_lastname}}</td>
      <td><strong>Rif/Cédula: </strong>{{$policy->client_ci}}</td>
      <td><strong>Teléfono: </strong>{{'0'.$policy->client_phone}}</td>
      <td><strong>Email: </strong> {{$policy->client_email}}</td>
    </tr>   
  </table>

  <table style="width:100%; margin-top: 12px;" class="vp-table">
    <caption><h1>Datos del vehiculo:</h1></caption>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Marca: </strong>{{$policy->vehicle_brand}}</td>
      <td class="rid-bb"><strong>Número de certificado: </strong>{{$policy->vehicle_certificate_number}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Modelo: </strong>{{$policy->vehicle_model}}</td>
      <td class="rid-bb"><strong>Placa: </strong>{{$policy->vehicle_registration}}</td>
    </tr>   
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Tipo: </strong>{{$policy->type}}</td>
      <td class="rid-bb"><strong>Serial motor:  </strong>{{$policy->vehicle_motor_serial}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Año: </strong>{{$policy->vehicle_year}}</td>
      <td class="rid-bb" style="width: 50%"><strong>Serial de carroceria: </strong>{{$policy->vehicle_bodywork_serial}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Color: </strong>{{$policy->vehicle_color}}</td>
      <td class="rid-bb"><strong>Uso: </strong>{{$policy->used_for}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Peso: </strong>{{$policy->vehicle_weight}}</td>
      <td class="rid-bb"></td>
    </tr>
  </table>

  <table style="width:100%; margin-top: 12px;" class="vp-table">
    <caption><h1>Datos de la póliza</h1></caption>
    <caption><h5>{{$policy->price->description}}</h5></caption>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Daños a cosas: </strong>{{$policy->price->damage_things}} bs.S</td>
      <td class="rid-bb"><strong>Prima: </strong>{{$policy->price->premium1}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Daños a personas: </strong>{{$policy->price->damage_people}} bs.S</td>
      <td class="rid-bb"><strong>Prima: </strong>{{$policy->price->premium2}}</td>
    </tr>   
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Asistencia jurídica: </strong>{{$policy->price->legal_assistance}} bs.S</td>
      <td class="rid-bb"><strong>Prima: </strong>{{$policy->price->premium3}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Muerte: </strong>{{$policy->price->death}} bs.S</td>
      <td class="rid-bb" style="width: 50%"><strong>Prima: </strong>{{$policy->price->premium4}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Invalidez: </strong>{{$policy->price->disability}} bs.S</td>
      <td class="rid-bb"><strong>Prima: </strong>{{$policy->price->premium5}}</td>
    </tr>
    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Gastos médicos: </strong>{{$policy->price->medical_expenses}} bs.S</td>
      <td class="rid-bb"><strong>Prima: </strong>{{$policy->price->premium6}}</td>
    </tr>
    <tr style="text-align:center;">
      @if($policy->price->crane == 0)
      <td class="right-bd rid-bb"><strong>Grua: </strong>No aplica</td>
      @else
      <td class="right-bd rid-bb"><strong>Grua: </strong>{{$policy->price->crane}}</td>
      @endif
      <td class="rid-bb"></td>
    </tr>

    <tr style="text-align:center;">
      <td class="right-bd rid-bb">&nbsp;</td>
      <td class="rid-bb"></td>
    </tr>

    <tr style="text-align:center;">
      <td class="right-bd rid-bb"><strong>Total Cobertura: </strong>{{$policy->price->total_all}}</td>
      <td class="rid-bb"><strong>Total Prima:</strong>{{$policy->price->total_premium}}</td>
    </tr>


  </table>
</body>
</html>