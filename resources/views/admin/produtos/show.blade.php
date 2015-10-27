@extends('admin.default_admin')

@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">// {{$produto->nome}}</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table class="table table-striped">	
				<tr>
					<td>Id:</td>
					<td class="sorting_1">{{$produto->id}}</td>
				</tr>
				<tr>
					<td>Nome Produto:</td>
					<td>{{$produto->nome}}</td>
				</tr>
				<tr>
					<td>Categoria:</td>
					<td>--</td>
				</tr>
				<tr>
					<td>Valor:</td>
					<td>{{ number_format($produto->valor, 2) }}</td>
				</tr>
				<tr>
					<td>Descrição:</td>
					<td>{{$produto->descricao}}</td>
				</tr>
				<tr>
					<td>Quantidade em estoque:</td>
					<td>{{$produto->quantidade}}</td>
				</tr>
			</table>
		</div><!-- /.box-body -->
	</div>

	<button type="buttom" name="" class="btn btn-warning btn-lg btn-flat" onclick="window.history.back();">Voltar</button>
	<a href="" class="btn btn-info btn-lg btn-flat">Editar</a>
	<a href="{{ asset('/admin/produtos/excluir') }}/{{$produto->id}}" class="btn btn-danger btn-lg btn-flat">Excluir</a>

@stop