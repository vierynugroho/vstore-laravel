<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
     data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}"
           class="navbar-brand">
            <img src="/assets/images/logo.svg"
                 alt="Store Logo" />
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}"
                       class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="#"
                       class="nav-link">Rewards</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}"
                       class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}"
                       class="btn btn-success nav-link px-4 text-white">Sign In</a>
                </li>
                @endguest
            </ul>
            @auth
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex">
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
                       class="nav-link d-inline-block">Cart</a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>