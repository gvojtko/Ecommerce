@extends('admin.default_admin')
@section('content')


	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar novo Produto</h3>
		</div>
		<div class="box-body">
			<form action="{{ asset('admin/produtos/adicionar') }}" method="post">
				<!--<input type="hidden" name="_method" value="POST">-->
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="hidden" name="id" value="{{$produto->id or ''}}"> 
				<div class="form-group">
					<input  value="{{$produto->nome or old('nome')}}" name ="nome" class="form-control input-lg" type="text" placeholder="Nome">
				</div>
				<div class="form-group">
					<input value="{{$produto->valor or old('valor')}}"  name="valor" class="form-control input-lg" type="number" placeholder="Valor">
				</div>
				<div class="form-group">
					<input value="{{$produto->quantidade or old('quantidade') }}"  name="quantidade" class="form-control input-lg" type="number" placeholder="Quantidade">			
				</div>
				
				<textarea name="descricao"  class="textarea" placeholder="Descrição do produto..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$produto->descricao or old('descricao')}}</textarea>
	            
				<div class="form-group">
					<input type="submit" value="Cadastrar" class="btn btn-flat btn-success">
					<button type="buttom" name="" class="btn btn-warning btn-lg pull-right" onclick="window.history.back();">Voltar</button>
				</div>

			</form>
		</div><!-- /.box-body -->
	</div>

@stop


@section('styles')
	<link rel="stylesheet" href="{!! asset("/admin/tema/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")!!}">
@stop

@section('scripts')
	<script src="{!! asset("/admin/tema/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")!!}"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
@stop