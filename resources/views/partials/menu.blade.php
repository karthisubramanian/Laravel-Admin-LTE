<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('master_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/categories*') ? 'menu-open' : '' }} {{ request()->is('admin/sub-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/holiday-masters*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.master.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase-medical">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.category.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sub_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sub-categories.index") }}" class="nav-link {{ request()->is('admin/sub-categories') || request()->is('admin/sub-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cubes">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.subCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('holiday_master_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.holiday-masters.index") }}" class="nav-link {{ request()->is('admin/holiday-masters') || request()->is('admin/holiday-masters/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cannabis">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.holidayMaster.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/task-statuses*') ? 'menu-open' : '' }} {{ request()->is('admin/task-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/tasks*') ? 'menu-open' : '' }} {{ request()->is('admin/tasks-calendars*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-list">

                            </i>
                            <p>
                                <span>{{ trans('cruds.taskManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-server">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskStatus.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-tags.index") }}" class="nav-link {{ request()->is('admin/task-tags') || request()->is('admin/task-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-server">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskTag.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.task.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tasks_calendar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is('admin/tasks-calendars') || request()->is('admin/tasks-calendars/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-calendar">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.tasksCalendar.title') }}</span>
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
                            <i class="fas fa-fw fa-sign-out-alt">

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