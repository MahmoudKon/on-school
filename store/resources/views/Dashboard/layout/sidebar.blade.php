<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content menu-accordion">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        
        <li class=" nav-item {{ is_active('dashboard') }}">
        <a href="{{ route('dashboard.index') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">@lang('site.dashboard')</span></a>
        </li>
        
        <li class="nav-item has-sub {{ is_active('users') }} ">
         <a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.bootstrap_tables.main">@lang('site.users') </span></a>
          <ul class="menu-content">
            <li class=""><a class="menu-item" href="{{ route('users.index') }}" data-i18n="nav.bootstrap_tables.table_basic">@lang('site.users')</a>
            </li>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-sub {{ is_active('categories') }} ">
          <a href="#"><i class="la la-th"></i><span class="menu-title" data-i18n="nav.bootstrap_tables.main">@lang('site.categories') </span></a>
           <ul class="menu-content">
             <li class=""><a class="menu-item" href="{{ route('categories.index') }}" data-i18n="nav.bootstrap_tables.table_basic">@lang('site.categories')</a>
             </li>
             </li>
           </ul>
        </li>
         
      </ul>
    </div>
  </div>
