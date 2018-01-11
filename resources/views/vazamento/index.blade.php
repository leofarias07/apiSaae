@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Vazamentos <a href="vazamentos/create"><button class="btn btn-success">Novo</button></a></h3>
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

					<th>Opções</th>
				</thead>
               @foreach ($vazamentos as $vaz)
				<tr>
					<td>{{ $vaz->idvazamento}}</td>
					<td>{{ $vaz->endereco}}</td>
					<td>{{ $vaz->descricao}}</td>
					<td>{{ $vaz->contao}}</td>
					<td>
						<a href="{{URL::action('VazamentoController@edit',$vaz->idvazamento)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$vaz->idvazamento}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('vazamento.modal')
				@endforeach
			</table>
		</div>
		{{$vazamentos->render()}}
	</div>
</div>

@stop