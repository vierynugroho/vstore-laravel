<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
              content="" />
        <meta name="author"
              content="" />

        <title>@yield('title')</title>

        @stack('prepend-style')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css"
              rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
              crossorigin="anonymous" />

        {{-- Data tables --}}
        <link rel="stylesheet"
              type="text/css"
              href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />


        <link href="/style/main.css"
              rel="stylesheet" />
        @stack('addon-style')
    </head>

    <body>
        <div class="page-dashboard">
            <div class="d-flex "
                 id="wrapper"
                 data-aos="fade-right">
                <!-- sidebar -->
                <div class="border-right mt-md-5"
                     id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <img src="/assets/images/admin.png"
                             alt="store logo"
                             class="my-4 w-50"
                             style="max-width: 150px" />
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="/admin"
                           class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}"">Dashboard</a>
                    <a href="
                           {{ route('product.index') }}"
                           class="list-group-item list-group-item-action {{ request()->is('admin/product') ? 'active' : '' }}">Products</a>
                        <a href="{{ route('product-gallery.index') }}"
                           class="list-group-item list-group-item-action {{ request()->is('admin/product-gallery*') ? 'active' : '' }}">Galleries</a>
                        <a href="{{ route('category.index') }}"
                           class="list-group-item list-group-item-action {{ request()->is('admin/category*') ? 'active' : '' }}">Categories</a>
                        <a href="#"
                           class="list-group-item list-group-item-action">Transactions</a>
                        <a href="{{ route('user.index') }}"
                           class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'active' : '' }}">Users</a>
                        <a href="/index.html"
                           class="list-group-item list-group-item-action">Sign Out</a>
                    </div>
                </div>

                <div id="page-content-wrapper">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
                         data-aos="fade-down">
                        <div class="container-fluid">
                            <button class="btn btn-secondary d-md-none mr-auto mr-2"
                                    id="menu-toggle">&laquo; Menu</button>
                            <!-- lg-none -->
                            <button class="navbar-toggler"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse"
                                 id="navbarSupportedContent">
                                <!-- Desktop Menu -->
                                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                    <li class="nav-item dropdown">
                                        <a href="#"
                                           class="nav-link"
                                           id="navbarDropdown"
                                           role="button"
                                           data-bs-toggle="dropdown">
                                            <img src="/assets/images/icon-user.png"
                                                 alt="User"
                                                 class="rounded-circle mr-2 profile-picture" />
                                            Hi, Viery
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="/dashboard.html"
                                               class="dropdown-item">Dashboard</a>
                                            <a href="/dashboard-account.html"
                                               class="dropdown-item">Settings</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="/"
                                               class="dropdown-item">Logout</a>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Mobile Menu -->
                                <ul class="navbar-nav d-block d-lg-none">
                                    <li class="nav-item">
                                        <a href="#"
                                           class="nav-link"> Hi, Viery </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                           class="nav-link d-inline-block">Cart</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        @stack('prepend-script')
        <script src="/vendor/node_modules/jquery/dist/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        <script>
            $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass('toggled');
        });
        </script>

        {{-- Data tables --}}
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>

        @stack('addon-script')
    </body>

</html>