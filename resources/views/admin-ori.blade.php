@extends('layouts.admin-modules')

@section('module')
<div class="container mt-4 ">
    <div class="row">
        <div class="col-12">
            <div id="container"></div>

            <script>
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'VENTAS POR MES'
                    },
                    xAxis: {
                        categories: [
                        'En',
                        'Febr',
                        'Mzo',
                        'Abr',
                        'My',
                        'Jun',
                        'Jul',
                        'Agt',
                        'Sept',
                        'Oct',
                        'Nov',
                        'Dic'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Número de ventas'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0;background:white;">{series.name}: </td>' +
                        '<td style="padding:0;background:white;"><b>{point.y:.1f}</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [
                    @foreach($offices as $office)
                    {name: '{{$office->estado->estado. ', ' .$office->municipio->municipio}}', data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]},
                    @endforeach
                    ]
                });

            </script>
        </div>
    </div>
</div>
</div>


@endsection
