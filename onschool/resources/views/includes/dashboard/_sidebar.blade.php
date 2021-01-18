<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- BEGIN DASHBOARD HOME LINK -->
            <li
                class="nav-item {{ (Request::segment(1) === App::getLocale() && Request::segment(3) === null) || (Request::segment(1) === 'dashboard' && Request::segment(2) === null) ? 'active open' : '' }}">
                <a href="{{ route('dashboard.home') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">
                        @lang('general.dashboard')
                    </span>
                </a>
            </li>
            <!-- END DASHBOARD HOME LINK -->

            <!-- BEGIN USERS LINK -->
            <li class="nav-item {{ active('users') }}">
                <a href="{{ route('dashboard.users.index') }}">
                    <i class="la la-users"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.users')</span>
                </a>
            </li>
            <!-- END USERS LINK -->
        </ul>
    </div>
</div>
