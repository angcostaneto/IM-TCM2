<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Apperitivo Imóveis') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('plugins/gentella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('plugins/gentella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('plugins/gentella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('plugins/gentella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('plugins/gentella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('plugins/gentella/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('plugins/gentella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('plugins/gentella/vendors/jquery/dist/jquery.min.js') }}"></script>
  </head>

    <div class="container body">
        
        <nav class="navbar navbar-default" style="border-radius: 0!important;">
            <div class="container-fluid">
                <img style="padding: 1em;" src="\img\logo.png">
            </div>
        </nav>
        
        <!-- page content -->
        <div class="right_col panel-body" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="footer_fixed">
          <div class="pull-right">
            Apperitivo Software &copy; {{date('Y')}}</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>

    <!-- Bootstrap -->
    <script src="{{ asset('plugins/gentella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/gentella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('plugins/gentella/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('plugins/gentella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('plugins/gentella/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('plugins/gentella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/gentella/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('plugins/gentella/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('plugins/gentella/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('plugins/gentella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('plugins/gentella/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/gentella/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('plugins/gentella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/gentella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>
	
  </body>
</html>
