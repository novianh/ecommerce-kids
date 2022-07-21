<header>
    <div class="container">
        <section class="ftco-section">
            <div class="container text-center pt-5 ">
                <img src="{{asset('storage/logo/' . $logo->logo) ??  asset('ecommerce/img/logooo.svg') }}" class="col-3 col-md-2 col-lg-2 col-xl-1"
                    alt="logo" width="100%">
                <nav class="navbar navbar-expand-lg ftco-navbar-light ftco_navbar bg-transparent p-5 mt-3">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fi fi-sr-apps"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                            <div class="navbar-nav text-start ">
                                <a class="{{ (request()->is('/')) ? 'active' : '' }} nav-line nav-link nav-link-ltr pb-lg-3 pb-3 px-0 mx-lg-4" aria-current="page"
                                    href="{{ route('home') }}" > Home</a>
                                <a class=" nav-line  nav-link nav-link-ltr pb-lg-3 pb-3 px-0 mx-lg-4"
                                    href="{{ route('home.category') }}" >Categories</a>
                                <a class="nav-line  nav-link nav-link-ltr pb-lg-3 pb-3 px-0 mx-lg-4"
                                    href="{{ route('about.home.index') }}">About
                                    Us</a>
                                <a class="nav-line  nav-link nav-link-ltr pb-lg-3 pb-3 px-0 mx-lg-4"
                                    href="{{ route('products.index') }}">Products</a>
                                <a class="nav-line  nav-link nav-link-ltr pb-lg-3 pb-3 px-0 mx-lg-4"
                                    href="{{ route('collection.index') }}">Collection</a>
                                <a class="nav-line  nav-link nav-link-ltr pb-lg-3 pb-3 px-0 mx-lg-4"
                                    href="{{ route('home') }}/#getintouch">Contact Us</a>


                            </div>
                        </div>
                        <div class="order-lg-last">
                            <div class="mb-0 d-flex">
                                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="icon-menu"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav me-auto">

                                    </ul> --}}

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('transaction') }}">
                                                    {{ __('Orders') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">
                                                    {{ __('Profile') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>


                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                                {{-- </div> --}}

                                <a href="{{ route('cart') }}"
                                    class="d-flex align-items-center justify-content-center text-decoration-none text-muted position-relative">
                                    <i class="fi fi-sr-shopping-cart" style="font-size: 20px;"></i>

                                    <span
                                        class="basket-item-count position-absolute top-0 start-100 translate-middle bg-light rounded-circle ">
                                        <span class="badge badge-pill text-dark"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </section>
    </div>


</header>
