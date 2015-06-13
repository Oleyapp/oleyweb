@extends('master')

@section('main-body')
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">      

      @include('court.partials.header')
      @include('court.partials.sidebar')

      <div class="content-wrapper">
        <section class="content-header">
          @yield('content-header')
          <ol class="breadcrumb">
            @yield('breadcrumb')
          </ol>
        </section>
        <section class="content">
            @yield('content')
        </section>
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015 Oleyh
      </footer>
      
      @include('court.partials.control')
      
    </div>

    @section('script')
        <!-- jQuery 2.1.4 -->
        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../../plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/app.min.js" type="text/javascript"></script>
        <!-- Demo -->
        <script src="../../dist/js/demo.js" type="text/javascript"></script>
    @show
  </body>
@stop
