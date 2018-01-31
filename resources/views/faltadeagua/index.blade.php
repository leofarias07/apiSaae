
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Falta de Agua <a href="faltadeagua/create"></a></h3>
		@include('faltadeagua.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Endereço</th>
					<th>Descrição</th>
					<th>Contato</th>
					<th>Data</th>
					<th>Condição</th>

					
				</thead>
               @foreach ($faltadeaguas as $fal)
				<tr>
					<td>{{ $fal->idfalta_de_agua}}</td>
					<td>{{ $fal->endereco}}</td>
					<td>{{ $fal->descricao}}</td>
					<td>{{ $fal->contato}}</td>
				
					<td>{{ date( 'd/m/Y' , strtotime($fal->created_at))}}</td>
				
					@if ($fal->statusgeral == "Em Aberto")
					<td><span class="label label-danger">{{ $fal->statusgeral}}</span></td>
					@else
					<td><span class="label label-success">{{ $fal->statusgeral}}</span></td>
					@endif
				
				</tr>
				@include('faltadeagua.modal')
				@endforeach
			</table>
		</div>
		{{$faltadeaguas->render()}}
	</div>
</div>
@stop