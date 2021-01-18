<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header bg-dark">
            <ul class="nav navbar-navflex-row">
                <!-- BEGIN ICON FOR MOBILE -->
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <!-- END ICON FOR MOBILE -->

                <!-- BEGIN FOR LOGO LINK -->
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('dashboard.home') }}">
                        <img class="brand-logo" alt="modern admin logo"
                            src="{{ asset('assets/dashboard/images/logo/logo.png') }}">
                        <h3 class="brand-text white">@lang('general.logo')</h3>
                    </a>
                </li>
                <!-- BEGIN FOR LOGO LINK -->

                <!-- BEGIN ICON FOR PHONE SCREAN WIDTH -->
                <li class="nav-item d-md-none">
                    <button class="btn bg-transparent nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile">
                        <i class="la la-ellipsis-v"></i>
                    </button>
                </li>
                <!-- END ICON FOR PHONE SCREAN WIDTH -->
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <!-- BEGIN ICON FOR MENU -->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                    <!-- BEGIN ICON FOR MENU -->

                    <!-- BEGIN ICON FOR FULL WIDTH WINDOW -->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li>
                    <!-- BEGIN ICON FOR FULL WIDTH WINDOW -->
                </ul>

                <ul class="nav navbar-nav float-right">
                    <!-- BEGIN SELECT THE LANGUAGES -->
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentFlagName() }}"></i>
                            <span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ App::getLocale() !== $localeCode ? LaravelLocalization::getLocalizedURL($localeCode, null, [], true) : 'javascript::void(0)' }}">
                                    <i class="flag-icon flag-icon-{{ $properties['flag'] }}"></i>
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <!-- END SELECT THE LANGUAGES -->

                    <!-- BEGIN USER LINKS -->
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link pt-1" href="#" data-toggle="dropdown"
                            style="line-height: 31px !important;">
                            <span class="mr-1">@lang('general.hello'),
                                <span class="user-name text-bold-700">{{ Auth::guard('admin')->user()->name }}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{ Auth::guard('admin')->user()->image_path }}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i
                                    class="ft-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                            <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> @lang('auth.logout')
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!-- END USER LINKS -->
                </ul>
            </div>
        </div>
    </div>
</nav>
