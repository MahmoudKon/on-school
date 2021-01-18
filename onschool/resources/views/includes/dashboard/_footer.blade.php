<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>

<!-- BEGIN APP JS -->
    <script src="{{ asset('js/app.js') }}"></script>
<!-- END APP JS -->
<!-- BEGIN VENDOR JS-->
    <script type="text/javascript" src="{{ path('vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="{{ path('vendors/js/extensions/jquery.toolbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ path('js/scripts/extensions/toolbar.js') }}"></script>
    <!-- HERE ANY PLUGINS -->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
    <script type="text/javascript" src="{{ path('js/core/app-menu.js') }}"></script>
    <script type="text/javascript" src="{{ path('js/core/app.js') }}"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
    <script type="text/javascript" src="{{ path('js/scripts/extensions/block-ui.js') }}"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN SWEET & TOASTR ALERT BLADE -->
    @toastr_js
    @toastr_render
    @include('sweet::alert')
<!-- END SWEET & TOASTR ALERT BLADE -->
<!-- BEGIN DATATABLES JS -->
    @if(isset($dataTable))
    <script type="text/javascript" src="{{ path('vendors/js/tables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ path('vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ path('vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
    @endif
<!-- END DATATABLES JS -->
<!-- BEGIN LIVEWIRE JS -->
    <livewire:scripts />
<!-- END LIVEWIRE JS -->
<!-- BEGIN CUSTOM JS -->
    <script type="text/javascript" src="{{ path('custom/js/script.js') }}"></script>
<!-- END CUSTOM JS -->
<!-- BEGIN INCLUDE CODE -->
    @yield('script')
    @stack('script')
<!-- END INCLUDE CODE -->

</body>
</html>
