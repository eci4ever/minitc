<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <span class="brand-text font-weight-light">JPN Melaka SSO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('global.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('announcement_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.announcements.index") }}" class="nav-link {{ request()->is('admin/announcements') || request()->is('admin/announcements/*') ? 'active' : '' }}">
                            <i class="fas fa-bullhorn">

                            </i>
                            <p>
                                <span>Announcement</span>
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.profiles.index") }}" class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                        <p>
                            <i class="fas fa-user">

                            </i>
                            <span>Profile</span>
                        </p>
                    </a>
                </li>
                @can('movement_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/movements*') ? 'menu-open' : '' }} {{ request()->is('admin/movements*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-road">

                            </i>
                            <p>
                                <span>E-Gerak</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('movement_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.movements.allindex') }}" class="nav-link {{ request()->is('admin/movements/allindex') ? 'active' : '' }}">
                                        <i class="fas fa-arrows-alt-h">

                                        </i>
                                        <p>
                                            <span>All Movement</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('movement_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.movements.myindex') }}" class="nav-link {{ request()->is('admin/movements/myindex') || request()->is('admin/movements/create') || request()->is('admin/movements/*/edit') ? 'active' : '' }}">
                                        <i class="fas fa-walking">

                                        </i>
                                        <p>
                                            <span>My Movement</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('minute_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/minutes*') ? 'menu-open' : '' }} {{ request()->is('admin/verifies*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-clipboard">

                            </i>
                            <p>
                                <span>Minute Management</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('minute_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.minutes.index") }}" class="nav-link {{ request()->is('admin/minutes') || request()->is('admin/minutes/*') ? 'active' : '' }}">
                                        <i class="fas fa-clipboard">

                                        </i>
                                        <p>
                                            <span>Minute</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('verify_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.verifies.index") }}" class="nav-link {{ request()->is('admin/verifies') || request()->is('admin/verifies/*') ? 'active' : '' }}">
                                        <i class="fas fa-check-double">

                                        </i>
                                        <p>
                                            <span>Verify</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
