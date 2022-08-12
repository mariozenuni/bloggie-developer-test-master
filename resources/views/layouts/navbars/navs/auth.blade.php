<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a
            class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
            href="{{ route('admin.index') }}"
        >
            Dashboard
        </a>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a
                    class="nav-link pr-0"
                    aria-haspopup="true"
                    aria-expanded="false"
                    data-toggle="dropdown"
                    href="#"
                    role="button"
                >
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img
                                alt="Image placeholder"
                                src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg"
                            >
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">
                                {{ auth()->user()->name }}
                            </span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">
                            Welcome!
                        </h6>
                    </div>
                    <a
                        class="dropdown-item"
                        href="{{ route('home') }}"
                    >
                        <i class="ni ni-world"></i>
                        <span>View Site</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a
                        class="dropdown-item"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
