
 <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
  </footer>


  @include('sweetalert::alert')
       
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('js/core/app-menu.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/scripts/customizer.js') }}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('vendors/js/ui/prism.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendors/js/ui/affix.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/scripts/documentation.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  
  <script src="{{ asset('js/backend.js') }}" type="text/javascript"></script>
  @stack('js')
  
</body>
</html>