<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=1' name='viewport' />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="on" http-equiv="cleartype">


    <!--icono-->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/konecta.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--titlte-->
    <title>{{ config('app.name') }}-@yield("tittle")</title>

    <!-- bootstrap-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--select 2-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/select2/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/select2/select2-bootstrap4-theme.css') }}"/>

    <!--datatable-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/DataTables/datatables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/DataTables/DataTables-1.10.23/css/dataTables.foundation.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/DataTables/Responsive-2.2.7/css/responsive.bootstrap4.min.css') }}"/>
    
    <!--iconos-->
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>

    <!-- dialog -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/plugins/bootstrap-dialog/bootstrap-dialog.min.css') }}"/>

    <!-- Archivos necesarios de style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../resources/css/app.css') }}" rel="stylesheet">


    <!-- para tener la routes de laravel en le javascript "tightenco/ziggy"-->
    @routes
</head>

<body>
    <!-- gif de cargado -->
    <div class="loader"></div>

    <!-- notificaciones -->
    <div id="ohsnap"></div> 
    
    <!-- barra de navegacion -->
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark menu-app">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('/logo.svg')}}" class="logoNav" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               
                
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route("producto.invenario")}}"  role="button" >
                        <i class="fas fa-boxes"></i> productos
                    </a>
                    
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route("ventas.index")}}"  role="button" >
                        <i class="fas fa-shopping-cart"></i> ventas
                    </a>
                    
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <input type="hidden" name="_token" value="<?php Session::token() ?>">
        <br>
        <br>
        <br>
        <br>
        @yield('content')
    </div>

</body>

<footer>
    
    <!-- jquery -->
    <script type="text/javascript" src="{{ asset('../resources/plugins/jquery/jquery-3.5.1.js') }}"></script>

    <!-- bootstrap -->
    <script type="text/javascript" src="{{ asset('../resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('../resources/plugins/bootstrap/popper/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../resources/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../resources/plugins/bootstrap/moment/moment.min.js') }}"></script>

    <!--datatable-->
    <script type="text/javascript" src="{{ asset('../resources/plugins/DataTables/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../resources/plugins/DataTables/DataTables-1.10.23/js/dataTables.foundation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../resources/plugins/DataTables/Responsive-2.2.7/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../resources/plugins/DataTables/Responsive-2.2.7/js/responsive.bootstrap4.min.js') }}"></script>
    
    <!-- ohsnap -->
    <script type="text/javascript" src="{{ asset('../resources/plugins/ohsnap/ohsnap.js') }}"></script>

    <!--select 2-->
    <script type="text/javascript" src="{{ asset('../resources/plugins/select2/select2.full.js') }}"></script>

    <!--scrollTo-->
    <script type="text/javascript" src="{{ asset('../resources/plugins/jquery.scrollTo/jquery.scrollTo.min.js') }}"></script>

    <!-- dialog -->
    <script type="text/javascript" src="{{ asset('../resources/plugins/bootstrap-dialog/bootstrap-dialog.min.js') }}"></script>

    <!-- Scripts global de la pagina -->
    <script type="text/javascript" src="{{ asset('../resources/js/app.js') }}"></script>

    <!-- Scripts propio de la vista -->
    <script type="text/javascript" src="{{ asset('../resources/js/') }}/@yield('script')"></script>

</footer>

</html>

