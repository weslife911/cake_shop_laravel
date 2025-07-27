<div id="preloder">
    <div class="loader"></div>
</div>

<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__cart">
        <div class="offcanvas__cart__links">
            <a href="" class="search-switch"><img src="{{ asset("img/icon/search.png") }}" alt=""></a>
            <a href="#"><img src="{{ asset("img/icon/heart.png") }}" alt=""></a>
        </div>
        @auth
            <div class="offcanvas__cart__item">
                <a href="#"><img src="{{ asset("img/icon/cart.png") }}" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        @endauth
    </div>
    <div class="offcanvas__logo">
        <a href="{{ route("home") }}"><img src="{{ asset("img/logo.png") }}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__option">
        <ul>
            <li>USD <span class="arrow_carrot-down"></span>
                <ul>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </li>
            <li>ENG <span class="arrow_carrot-down"></span>
                <ul>
                    <li>Spanish</li>
                    <li>ENG</li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header__top__inner">
                        <div class="header__top__left">
                            <ul>
                                <li>USD <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>EUR</li>
                                        <li>USD</li>
                                    </ul>
                                </li>
                                <li>ENG <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>Spanish</li>
                                        <li>ENG</li>
                                    </ul>
                                </li>
                                @guest
                                    <li>
                                    <a href="{{ route("login") }}" >
                                        Sign in
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route("register") }}" >
                                    Sign up    
                                    </a>    
                                <li>
                                    @else
                                <li>
                                    <form method="POST" action="{{ route("logout") }}" >
                                        @csrf
                                        <button type="submit" class="site-btn">Logout</button>
                                    </form>
                                </li>
                                @endguest
                            </ul>
                        </div>
                        <div class="header__logo">
                            <a href="{{ route("home") }}"><img src="{{ asset("img/logo.png") }}" alt=""></a>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__right__links">
                                <a href="#" class="search-switch"><img src="{{ asset("img/icon/search.png") }}" alt=""></a>
                                <a href="#"><img src="{{ asset("img/icon/heart.png") }}" alt=""></a>
                            </div>
                           @auth
                                <div class="header__top__right__cart">
                                <a href="{{ route("cart") }}"><img src="{{ asset("img/icon/cart.png") }}" alt=""> <span>0</span></a>
                                <div class="cart__price">Cart: <span>$0.00</span></div>
                            </div>
                           @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{ route("home") }}">Home</a></li>
                        <li><a href="{{ route("about") }}">About</a></li>
                        <li><a href="{{ route("shop") }}">Shop</a></li>
                        <li><a href="./blog.html">Blogs</a></li>
                        <li><a href="{{ route("contact") }}">Contact</a></li>
                        @if (Auth::check() && Auth::user()->role == "admin")
                            <li class="active"><a href="{{ route("admin.dashboard") }}">Admin</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>