@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Falta de Agua <a href="faltadeagua/create"><button class="btn btn-success">Novo</button></a></h3>
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
					<th>Condição</th>

					<th>Opções</th>
				</thead>
               @foreach ($faltadeaguas as $fal)
				<tr>
					<td>{{ $fal->idfaltadeagua}}</td>
					<td>{{ $fal->endereco}}</td>
					<td>{{ $fal->descricao}}</td>
					<td>{{ $fal->contato}}</td>
					<td>{{ $fal->condicao}}</td>
					<td>
						<a href="{{URL::action('FaltaDeAguaController@edit',$fal->idfaltadeagua)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$fal->idfaltadeagua}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('faltadeagua.modal')
				@endforeach
			</table>
		</div>
		{{$faltadeagua->render()}}
	</div>
</div>

@stop