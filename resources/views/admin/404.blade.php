@extends('admin.default_admin')
@section('content')
  <div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
      <p>
      We could not find the page you were looking for.
      Meanwhile, you may <a href="{{ asset('/admin') }}">return to dashboard</a> or try using the search form.
      </p>
      
      <div class="input-group">
        <div class="input-group-btn">
          <button type="buttom" name="" class="btn btn-info btn-lg pull-right" onclick="window.location = '/admin/';">Home</button>
          <button type="buttom" name="" class="btn btn-warning btn-lg pull-right" onclick="window.history.back();">Voltar</button>
        </div>
      </div><!-- /.input-group -->
      
    </div><!-- /.error-content -->
  </div>
@endsection
