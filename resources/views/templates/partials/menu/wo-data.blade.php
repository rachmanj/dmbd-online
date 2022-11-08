<li class="nav-item {{ request()->is('wo-data') || request()->is('wo-data/*') ? 'menu-open' : '' }}">
    <a href="{{ route('wo-data.index') }}" class="nav-link {{ request()->is('wo-data') || request()->is('wo-data/*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-folder"></i>
      <p>
        WO Data
      </p>
    </a>
  </li>