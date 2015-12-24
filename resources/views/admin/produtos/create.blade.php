@extends('admin.default_admin')
@section('content')


	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar novo Produto</h3>
		</div>
		<div class="box-body">
			<form action="{{ asset('admin/produtos/adicionar') }}" method="post">
				<!--<input type="hidden" name="_method" value="POST">-->
				@include('admin/produtos/form')
		
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