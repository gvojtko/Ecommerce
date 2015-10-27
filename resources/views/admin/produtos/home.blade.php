@extends('admin.default_admin')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Todos os Produtos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  	<div class="row">
	                  	<div class="col-sm-6">
		                  	<div class="per_page">
			                  	<form action="" id="form-per-page" method="post">	
			                  		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			                  		<label>Mostrar 
			                  			<select name="per_page" aria-controls="" class="form-control input-sm" id="per_page">
				                  			<option value="">-- {!!$produtos->perPage()!!} -- </option>
				                  			<option value="10">10</option>
				                  			<option value="20">20</option>
				                  			<option value="30">30</option>
				                  			<option value="50">50</option>
				                  			<option value="100">100</option>
				                  		</select> por página
				                  	</label>
			                  	</form>
			                </div>
		              	</div>
		              	<div class="col-sm-6">
		              		<div id="example1_filter" class="dataTables_filter pull-right">
		              			<label>Pesquisa por nome:
			              			<form action="" method="post">
			                  			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			              				<input type="search" class="form-control input-sm" name="filtro_nome" placeholder="" aria-controls="">
			              				<input type="submit" class="btn btn-success bt-flat" value="Buscar">
			              			</form>
		              			</label>
		              		</div>
		              	</div>
		            </div>
		            <div class="row">
		            	<div class="col-sm-12">
		            		@if(!empty($produtos))
		            			<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
				                    <thead>
				                      <tr role="row">
				                      	<th class="sorting_asc" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 293px;">
				                      		Id
				                      	</th>
				                      	<th class="sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 358px;">
				                      		Nome
				                      	</th>
				                      	<th class="sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 317px;">
				                      		Valor
				                      	</th>
				                      	<th class="sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 255px;">
				                      		Descrição
				                      	</th>
				                      	<th class="sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">
				                      		Estoque
				                    	</th>
				                    	<th class="sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">
				                      		Ações
				                    	</th>
									</tr>
				                    </thead>
				                    <tbody>
					                    @foreach($produtos as $produto)
						                    <tr role="row" class="odd {{$produto->quantidade<=1 ? 'danger' : '' }}">
							                     <td class="sorting_1">{{$produto->id}}</td>
							                     <td>{{$produto->nome}}</td>
							                     <td>{{ number_format($produto->valor, 2) }}</td>
							                     <td>{{substr($produto->descricao, 0, 15)}} ...</td>
							                     <td>{{$produto->quantidade}}</td>
							                     <td>
							                     	<a href="{{ asset('/admin/produtos/detalhes/') }}/{{{$produto->id}}}" title="Visualizar"><i class="fa fa-fw  fa-eye"></i></a>
							                     	<a href="{{ asset('/admin/produtos/editar/') }}/{{{$produto->id}}}" title="Editar"><i class="fa fa-fw  fa-pencil"></i></a>
							                     	<a href="{{ asset('/admin/produtos/excluir/') }}/{{{$produto->id}}}" title="Excluir"><i class="fa fa-fw fa-trash"></i></a>
							                     </td>
						                     </tr>
				                    	@endforeach
				                    </tbody>
				                    <tfoot>
				                    	<tr>
				                    		<th rowspan="1" colspan="1">Id</th>
				                    		<th rowspan="1" colspan="1">Nome</th>
				                    		<th rowspan="1" colspan="1">Valor</th>
				                    		<th rowspan="1" colspan="1">Descrição</th>
				                    		<th rowspan="1" colspan="1">Estoque</th>
				                    		<th rowspan="1" colspan="1">Açoes</th>
				                    	</tr>
	                    			</tfoot>
	                  			</table>
	                  			<span class="label label-danger pull-right">
									Um ou menos itens no estoque
								</span>
	                  		@else
	                  			<div class="callout callout-danger">
	                  				<h4> <i class="fa fa-frown-o"></i> Nenhum produto encontrado!</h4>
	                  			</div>
		            		@endif
                  		</div>
                  	</div>
                  	<div class="row">
                  		<div class="col-sm-6">
                  			<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                  				Mostrando <strong>{!!$produtos->count()!!}</strong> de um total de <strong>{!!$produtos->total()!!}</strong> registros. 
                  			</div>
                  		</div>
                  		<div class="col-sm-6">
                  			<div class="dataTables_paginate paging_simple_numbers pull-right" id="example1_paginate">
                  				{!! $produtos->render() !!}
                  			</div>
                  		</div>
                  	</div>
                  </div>
                </div><!-- /.box-body -->
              </div>
	</div>			
</div>

@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#per_page').on('change', function(){
			$('#form-per-page').submit();
		});
	});
</script>
@stop
