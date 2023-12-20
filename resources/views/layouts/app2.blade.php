<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Resource Africa - Home</title>
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
</head>
<body>
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">

    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side User -->
                <div class="content-side content-side-user px-0 py-0">
                    <!-- Visible only in mini mode -->
                    <div class="smini-visible-block animated fadeIn px-3">
                        <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
                    </div>
                    <!-- END Visible only in mini mode -->

                    <!-- Visible only in normal mode -->
                    <div class="smini-hidden text-center mx-auto">
                        <a class="img-link" href="">
                            <img class="img-avatar" src="{{ asset('ra-logo.png') }}" alt=""
                                 style="height: 90px; width: auto">
                        </a>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
                <!-- END Side User -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <i class="nav-main-link-icon fa fa-house-user"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Modules</li>
                        @if(in_array('wildlife.read', $permissions))
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                   aria-haspopup="true"
                                   aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-feather"></i>
                                    <span class="nav-main-link-name">Wildlife</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                           href="{{ url($data['org']->slug.'/wildlife-species/') }}">
                                            <span class="nav-main-link-name">Manage Species</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(in_array('hwc.read', $permissions))
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                   aria-haspopup="true"
                                   aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-warning"></i>
                                    <span class="nav-main-link-name">H.W.C</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                           href="{{ url($data['org']->slug.'/human-wildlife-conflict/create') }}">
                                            <span class="nav-main-link-name">Add Incident</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                           href="{{ url($data['org']->slug.'/human-wildlife-conflict/') }}">
                                            <span class="nav-main-link-name">Historical Incidents</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(in_array('pac.read', $permissions))
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                   aria-haspopup="true"
                                   aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-shield"></i>
                                    <span class="nav-main-link-name">P.A.C</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"
                                           href="{{ url($data['org']->slug.'/problematic-animal-control/') }}">
                                            <span class="nav-main-link-name">Manage Incidents</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="space-x-1">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="space-x-1">
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user d-sm-none"></i>
                        <span
                            class="d-none d-sm-inline-block fw-semibold">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </span>
                        <i class="fa fa-angle-down opacity-50 ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                         aria-labelledby="page-header-user-dropdown">
                        <div class="px-2 py-3 bg-body-light rounded-top">
                            <h5 class="h6 text-center mb-0">
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            </h5>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                               href="be_pages_generic_profile.html">
                                <span>Profile</span>
                                <i class="fa fa-fw fa-user opacity-25"></i>
                            </a>
                            <div class="dropdown-divider"></div>

                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                               href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <span>Settings</span>
                                <i class="fa fa-fw fa-wrench opacity-25"></i>
                            </a>
                            <!-- END Side Overlay -->

                            <div class="dropdown-divider"></div>
                            <a href="{{ auth()->check() ? route('logout') : '#' }}"
                               onclick="{{ auth()->check() ? "event.preventDefault(); document.getElementById('logout-form').submit();" : '' }}"
                               class="dropdown-item d-flex align-items-center justify-content-between space-x-1">
                                <span>Sign Out</span>
                                <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                            </a>
                            @if(auth()->check())
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-secondary" data-toggle="layout"
                                data-action="header_search_off">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                        <input type="text" class="form-control" placeholder="Search or hit ESC.."
                               id="page-header-search-input" name="page-header-search-input">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-fw fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="far fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        @yield('content')

    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer">
        <div class="content py-3">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                                                                               href=""
                                                                               target="_blank">Leading Digital</a>
                </div>
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                    <a class="fw-semibold" target="_blank">Resource Africa</a> &copy;
                    <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@stack('scripts')
</body>
</html>
