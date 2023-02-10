<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home*') || request()->is('/')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('companies*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-building nav-icon"></i>
                    <p>
                        Company
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none; background-color:#2d3338">
                    <li class="nav-item">
                        <a href="{{ route('companies.index') }}" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Company List</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview" style="display: none; background-color:#2d3338">
                    <li class="nav-item">
                        <a href="{{ route('companies.add-company') }}" class="nav-link">
                            <i class="far fa-plus-square nav-icon"></i>
                            <p>Add Company</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="user-panel pb-3 nav-item">
                <a href="{{ route('about') }}" class="nav-link {{ (request()->is('about*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                        {{ __('About') }}
                    </p>
                </a>
            </li>

            <li class="user-panel py-3 nav-item logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            {{ __('Log Out') }}
                        </p>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
