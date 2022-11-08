<li class="nav-item {{ request()->is('breakdowns') || request()->is('breakdowns/*') || request()->is('dashboard') || request()->is('dashboard/*') || request()->is('history') || request()->is('history/*') ? 'menu-open' : '' }}">
  <a href="#" class="nav-link {{ request()->is('breakdowns') || request()->is('breakdowns/*') || request()->is('dashboard') || request()->is('dashboard/*') || request()->is('history') || request()->is('history/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-folder"></i>
    <p>
      Breakdowns Info
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    
    <li class="nav-item">
      <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('dashboard') || request()->is('dashboard/*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('breakdowns.index') }}" class="nav-link {{ request()->is('breakdowns') || request()->is('breakdowns/*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>
          Breakdowns
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('history.index') }}" class="nav-link {{ request()->is('history') || request()->is('history/*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>
          History
        </p>
      </a>
    </li>
    
  </ul>
</li>

