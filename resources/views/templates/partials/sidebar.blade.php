<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>DMBD</b> - Online</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
          {{-- <a href="{{ route('home') }}" class="d-block">{{ Auth()->user()->name }}</a> --}}
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   
          <li class="nav-header">PLANT</li>
            @include('templates.partials.menu.plant')
            @include('templates.partials.menu.wo-data')
            {{-- @include('templates.partials.menu.category') --}}
  
          {{-- <li class="nav-header">MASTER DATA</li> --}}
          
          {{-- @include('templates.partials.menu.categories') --}}
          
  
        {{-- @can('akses_admin') --}}
            <li class="nav-header">ADMIN</li>
            @include('templates.partials.menu.admin')
        {{-- @endcan --}}
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>