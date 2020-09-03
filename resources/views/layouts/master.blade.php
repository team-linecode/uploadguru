<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SMK BM3</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hallo, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">SMK BM3</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/">BM3</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main Menu</li>
                        <li class="nav-item {{ request()->segment(1) == '' ? 'active' : '' }}">
                            <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'upload' ? 'active' : '' }}">
                            <a href="/upload" class="nav-link"><i class="fas fa-upload"></i><span>Upload</span></a>
                        </li>
                        @if (auth()->user()->level == 'Admin')
                        <li class="nav-item {{ request()->segment(1) == 'user' ? 'active' : '' }}">
                            <a href="/user" class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
                        </li>
                        @endif
                    </ul>
                </aside>
            </div>

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h4 class="p-0 m-0">{{ request()->segment(1) == 'user' ? 'User Data' : '' }}</h4>
                        <h4 class="p-0 m-0">{{ request()->segment(1) == 'edituser' ? 'Edit User Data' : '' }}</h4>
                        <h4 class="p-0 m-0">{{ request()->segment(1) == 'upload' ? 'Upload File' : '' }}</h4>
                        <h4 class="p-0 m-0">{{ request()->segment(1) == '' ? 'Dashboard' : '' }}</h4>
                    </div>
                </section>
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div> Made By <a href="/">LineCode</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.min.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="/assets/js/page/index.js"></script>
</body>

</html>