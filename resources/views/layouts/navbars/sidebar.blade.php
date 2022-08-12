<nav
    id="sidenav-main"
    class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white"
>
    <div class="container-fluid">
        <!-- Toggler -->
        <button
            class="navbar-toggler"
            aria-controls="sidenav-main"
            aria-expanded="false"
            aria-label="Toggle navigation"
            data-target="#sidenav-collapse-main"
            data-toggle="collapse"
            type="button"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a
            class="navbar-brand pt-0"
            href="{{ route('admin.index') }}"
        >
            <h1 class="font-weight-bold text-lg text-primary">
                Bloggie
            </h1>
        </a>
        <!-- Collapse -->
        <div
            id="sidenav-collapse-main"
            class="collapse navbar-collapse"
        >
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin.index') }}">
                            <h1 class="font-weight-bold text-lg text-primary">
                                Bloggie
                            </h1>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button
                            class="navbar-toggler"
                            aria-controls="sidenav-main"
                            aria-expanded="false"
                            aria-label="Toggle sidenav"
                            data-target="#sidenav-collapse-main"
                            data-toggle="collapse"
                            type="button"
                        >
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('admin.index') }}"
                    >
                        <i class="ni ni-tv-2 text-primary"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('admin.blog.index') }}"
                    >
                        <i class="ni ni-archive-2 text-green"></i>
                        Blog Posts
                    </a>
                </li>

                <!-- TODO: Use this link when implementing testimonials
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="ni ni-chat-round text-orange"></i> Testimonials
                    </a>
                </li>
                -->
            </ul>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Settings</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-settings-gear-65"></i> System Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
