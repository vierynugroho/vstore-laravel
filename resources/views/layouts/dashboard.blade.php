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

        <link href="/style/main.css"
              rel="stylesheet" />
        @stack('addon-style')
    </head>

    <body>
        <div class="page-dashboard">
            <div class="d-flex"
                 id="wrapper"
                 data-aos="fade-right">
                <!-- sidebar -->
                <div class="border-right mt-sm-4"
                     id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <a href="{{route('home')}}">
                            <img src="/assets/images/dashboard-store-logo.svg"
                                 alt="store logo"
                                 class="my-4" />
                        </a>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}"
                           class="list-group-item list-group-item-action  {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('dashboard-product') }}"
                           class="list-group-item list-group-item-action  {{ request()->is('dashboard/products*') ? 'active' : '' }}">My
                            Products</a>
                        <a href="{{ route('dashboard-transactions') }}"
                           class="list-group-item list-group-item-action  {{ request()->is('dashboard/transactions*') ? 'active' : '' }}">Transactions</a>
                        <a href="{{ route('dashboard-settings-store') }}"
                           class="list-group-item list-group-item-action  {{ request()->is('dashboard/settings*') ? 'active' : '' }}">Store
                            Settings</a>
                        <a href="{{ route('dashboard-settings-account') }}"
                           class="list-group-item list-group-item-action  {{ request()->is('dashboard/account*') ? 'active' : '' }}">My
                            Account</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                           class="list-group-item list-group-item-action">Sign Out</a>
                        <form id="logout-form"
                              action="{{ route('logout') }}"
                              method="POST"
                              style="display: none">
                            @csrf
                        </form>
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
                                            <img src="{{ Storage::url(auth()->user()->photo) }}"
                                                 alt="User Profile"
                                                 class="rounded-circle mr-2 profile-picture"
                                                 style="object-fit: cover; width: 45px; height: 45px; object-position: 100% 0;" />
                                            Hi, {{ auth()->user()->name }}
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('dashboard') }}"
                                               class="dropdown-item">Dashboard</a>
                                            <a href="{{ route('dashboard-settings-account') }}"
                                               class="dropdown-item">Settings</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                               class="dropdown-item">Logout</a>
                                            <form id="logout-form"
                                                  action="{{ route('logout') }}"
                                                  method="POST"
                                                  style="display: none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cart') }}"
                                           class="nav-link d-inline-block mt-2">
                                            @php
                                            $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                            @endphp

                                            @if ($carts > 0)
                                            <img src="/assets/images/icon-cart-filled.svg"
                                                 alt="Cart" />
                                            <div class="card-badge">{{ $carts }}</div>
                                            @else
                                            <img src="/assets/images/icon-cart-empty.svg"
                                                 alt="Cart" />
                                            @endif
                                        </a>
                                    </li>
                                </ul>

                                <!-- Mobile Menu -->
                                <ul class="navbar-nav d-block d-lg-none">
                                    <li class="nav-item">
                                        <a href="#"
                                           class="nav-link"> Hi, {{ auth()->user()->name }} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cart') }}"
                                           class="nav-link d-inline-block mt-2">
                                            @php
                                            $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                            @endphp

                                            @if ($carts > 0)
                                            <img src="/assets/images/icon-cart-filled.svg"
                                                 alt="Cart" />
                                            <div class="card-badge">{{ $carts }}</div>
                                            @else
                                            <img src="/assets/images/icon-cart-empty.svg"
                                                 alt="Cart" />
                                            @endif
                                        </a>
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
        <script src="./vendor/node_modules/jquery/dist/jquery.min.js"></script>
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
        @stack('addon-script')
    </body>

</html>