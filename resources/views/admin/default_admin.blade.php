<!DOCTYPE html>
    <html lang="pt-Br">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{!! asset("/admin/tema/bootstrap/css/bootstrap.min.css") !!}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{!! asset("admin/tema/dist/css/AdminLTE.min.css")!!}" rel="stylesheet" type="text/css" />

        <link href="{!! asset("admin/tema/dist/css/skins/skin-black.min.css")!!}" rel="stylesheet" type="text/css" />

        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <div class="wrapper">

            @if(Auth::user())
                <!-- Header -->
                @include('admin.includes.header')
                    
                <!-- Sidebar -->
                @include('admin.includes.sidebar')
            @endif

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @if(Auth::user())
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            {{ $page_title or "Page Title" }}
                            <small>{{ $page_description or null }}</small>
                        </h1>
                        <!-- You can dynamically generate breadcrumbs here -->
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                            <li class="active">Here</li>
                        </ol>
                    </section>
                @endif

                <!-- Main content -->
                <section class="content">
                    @include('admin.includes.messages')
                    <!-- Your Page Content Here -->
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Footer -->
            @include('admin.includes.footer')
            

        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="{!! asset ("/admin/tema/plugins/jQuery/jQuery-2.1.4.min.js") !!}"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{!! asset ("/admin/tema/bootstrap/js/bootstrap.min.js") !!}" type="text/javascript"></script>
        
        <!-- AdminLTE App -->
        <script src="{!! asset ("/admin/tema/dist/js/app.min.js") !!}" type="text/javascript"></script>
        @yield('scripts')

    </body>
</html>