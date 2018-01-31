
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">

</div>



  <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
           @foreach ($vazamento as $vaz)
            <span class="info-box-icon bg-aqua">{{ $vaz->totalvaz}}</span>
             @endforeach
            <div class="info-box-content">
              <span class="info-box-text">Total de vazamentos</span>
              <span class="info-box-number">Concluido</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
            <div class="info-box" style="background:#DD4B39;">
            <span class="info-box-icon bg-aqua" style="background:#B13C2E;">{{ $vaz->vazaberto}}</span>

            <div class="info-box-content">
              <span class="info-box-text">Total de vazamentos</span>
              <span class="info-box-number">Em Aberto</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    </div>

<div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua">{{ $vaz->totallig}}</span>

            <div class="info-box-content">
              <span class="info-box-text">Total de Ligações Irregulares</span>
              <span class="info-box-number">Concluido</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
            <div class="info-box" style="background:#DD4B39;">
            <span class="info-box-icon bg-aqua" style="background:#B13C2E;">{{ $vaz->totallig}}</span>

            <div class="info-box-content">
              <span class="info-box-text">Total de Ligações Irregulares</span>
              <span class="info-box-number">Em Aberto</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua">{{ $vaz->totalfal}}</span>

            <div class="info-box-content">
              <span class="info-box-text">Total de Falta D´agua</span>
              <span class="info-box-number">Concluido</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
            <div class="info-box" style="background:#DD4B39;">
            <span class="info-box-icon bg-aqua" style="background:#B13C2E;">{{ $vaz->totalfal}}</span>

            <div class="info-box-content">
              <span class="info-box-text">Total de Falta D´agua</span>
              <span class="info-box-number">Em Aberto</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
</div>




  </div>

    <div class="row">
        <div class="col-sm-6 text-center">
            <div class="thumbnail">


       

             <div id="piechart" style="width: 450px; height: 300px;"></div>
         
            </div>
        </div>

        <div class="col-sm-6 text-center">
            <div class="thumbnail">
         
            <div id="chart_div" style="width: 450px; height: 300px;"></div>
            </div>
        </div>

    </div>
@stop


@section('js')
      <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Dinosaur', 'Length'],
                  ['Ligações Irregulares', {{ $vaz->totallig}}],
                  ['Numero de Vazamentos', {{ $vaz->totalvaz}}],
                  ['Falta de Agua', {{ $vaz->totalfal}}]]);

                var options = {
                  title: 'Nivel reclamações',
                  legend: { position: 'left' },
                };

                var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
                chart.draw(data, options);
              }
      </script>

             <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Ligações Iregulares',    {{ $vaz->totallig}}],
                  ['Total de Vazamento',    {{ $vaz->totalvaz}}],
                    ['Falta D´agua',   {{ $vaz->totalfal}}]
                ]);

                var options = {
                  title: 'Atividades',
                   'legend':'left',
                    'is3D':true,
                     'width':400,
                    'height':300
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
              }
            </script>
@stop











