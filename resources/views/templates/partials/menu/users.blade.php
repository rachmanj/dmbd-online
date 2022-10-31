<li class="nav-item {{ request()->is('users') || request()->is('users/*') || request()->is('roles') || request()->is('roles/*') || request()->is('permissions') || request()->is('permissions/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->is('users') || request()->is('users/*') || request()->is('roles') || request()->is('roles/*') || request()->is('permissions') || request()->is('permissions/*') ? 'active' : '' }}">
      <i class="fas fa-users"></i>
      <p>
        Users
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }} ">
          <i class="far fa-circle nav-icon"></i>
          <p>User List</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('roles') || request()->is('roles/*') ? 'active' : '' }} ">
          <i class="far fa-circle nav-icon"></i>
          <p>Roles List</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->is('permissions') || request()->is('permissions/*') ? 'active' : '' }} ">
          <i class="far fa-circle nav-icon"></i>
          <p>Permissions List</p>
        </a>
      </li>
    </ul>
  </li>