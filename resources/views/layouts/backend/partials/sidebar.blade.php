<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <div class="c-sidebar-brand-full" alt="{{ config('app.name') }} Logo">
      <div class="row">
        <div class="col-sm-12">
          <img src="{{ asset('assets/img/logo/logo-full.png') }}" class="img-fluid" style="max-width:100px">
        </div>
      </div>
    </div>
    <div class="c-sidebar-brand-minimized" alt="logo">
      <img src="{{ asset('assets/img/logo/logo.png') }}" width="46" height="46" alt="logo">
    </div>
  </div>
  <ul class="c-sidebar-nav">

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('home') }}">
        <i class="c-sidebar-nav-icon fas fa-tachometer-alt"></i>
        Dashboard
        <span class="badge badge-info">NEW</span>
      </a>
    </li>
    <li class="c-sidebar-nav-title">Menu</li>

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('pemohon.index') }}">
        <i class="c-sidebar-nav-icon fas fa-users"></i>
        Data Pemohon
        <span class="badge badge-info">NEW</span>
      </a>
    </li>

    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-title">Settings</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon fas fa-cog"></i>
        Settings
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        @can('read-user')
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{ route('users.index') }}" aria-expanded="false">
            <i class="c-sidebar-nav-icon fa fa-user"></i>
            User
          </a>
        </li>
        @endcan
        @can('read-role')
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{ route('roles.index') }}" aria-expanded="false">
            <i class="c-sidebar-nav-icon fa fa-university"></i>
            Role
          </a>
        </li>
        @endcan

      </ul>
    </li>

  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>