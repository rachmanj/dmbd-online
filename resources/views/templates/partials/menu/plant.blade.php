<li class="nav-item">
  <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('wo-dashboard') || request()->is('wo-dashboard/*') ? 'active' : '' }}">
    <i class="far fa-file-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ route('wo-data.index') }}" class="nav-link {{ request()->is('wo-data') || request()->is('wo-data/*') ? 'active' : '' }}">
    <i class="far fa-file-alt"></i>
    <p>
      WO Data
    </p>
  </a>
</li>