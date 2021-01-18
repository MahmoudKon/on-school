<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        @if(Request::segment(1) === 'dashboard' && Request::segment(2) !== null)
                            <a href="{{ route('dashboard.home') }}">
                                <i class="fa fa-home"></i> @lang('general.dashboard')
                            </a>
                        @elseif(Request::segment(2) === 'dashboard' && Request::segment(3) !== null)
                            <a href="{{ route('dashboard.home') }}">
                                <i class="fa fa-home"></i> @lang('general.dashboard')
                            </a>
                        @else
                            <i class="fa fa-home"></i> @lang('general.dashboard')
                        @endif
                    </li>
                    @yield('sub_menu')
                </ol>
            </div>
        </div>
    </div>
</div>
