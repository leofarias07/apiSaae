@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Vazamentos <a href="vazamentos/create"></a></h3>
		@include('vazamento.search')
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
               @foreach ($vazamento as $vaz)
				<tr>
					<td>{{ $vaz->id}}</td>
					<td>{{ $vaz->endereco}}</td>
					<td>{{ $vaz->descricao}}</td>
					<td>{{ $vaz->contato}}</td>
					<td>{{ date( 'd/m/Y' , strtotime($vaz->created_at))}}</td>
				
					@if ($vaz->statusgeral == "Em Aberto")
					<td><span class="label label-danger">{{ $vaz->statusgeral}}</span></td>
					@else
					<td><span class="label label-success">{{ $vaz->statusgeral}}</span></td>
					@endif
				</tr>
				@include('vazamento.modal')
				@endforeach
			</table>
		</div>
		{{$vazamento->render()}}
	</div>
</div>
@stop







