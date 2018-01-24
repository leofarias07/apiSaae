@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Ligações Irregulares<a href="ligtadeagua/create"></a></h3>
		@include('ligacaoirregular.search')
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
					<th>Data</th>
					<th>Condição</th>

				
				</thead>
               @foreach ($ligacao_irregular as $lig)
				<tr>
					<td>{{ $lig->id}}</td>
					<td>{{ $lig->endereco}}</td>
					<td>{{ $lig->descricao}}</td>
					
					<td>{{ date( 'd/m/Y' , strtotime($lig->created_at))}}</td>
				
					@if ($lig->statusgeral == "Em Aberto")
					<td><span class="label label-danger">{{ $lig->statusgeral}}</span></td>
					@else
					<td><span class="label label-success">{{ $lig->statusgeral}}</span></td>
					@endif
				
				</tr>
				@include('ligacaoirregular.modal')
				@endforeach
			</table>
		</div>
		{{$ligacao_irregular->render()}}
	</div>
</div>

@stop