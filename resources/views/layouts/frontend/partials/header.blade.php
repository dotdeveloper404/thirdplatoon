<header>
    <div class="top-header">
        <div class="container">
            <div class="col-md-9">
                <ul class="social-ul-top">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>twitter</a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>facebook</a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i>pinterest</a></li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i>Youtube</a></li>
                </ul>
            </div>

            <div class="col-md-3">

                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                    @endif
                </div>
                @endif

                <ul class="wish-ul">
                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>
                            wishlist</a></li>
                    <li>
                        @if (Route::has('login'))
                        @auth
                        <a href="{{route('login')}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Dashboard
                        </a>
                        @else
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <a href="{{route('login')}}">sign in</a> or <a href="{{route('register')}}">register</a>

                        @endif
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">

            <div class="col-md-4 logo-area">
                <a href="/">
                    <img src="assets/images/logo.png">
                </a>
            </div>

            <div class="col-md-8 main-nav-area">
                <ul class="main-nav-ul">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/about-us">ABOUT US</a></li>
                    <li><a href="/post-add">POST ADS</a></li>
                    <li><a href="/categories">CATEGORIES</a></li>
                    <li><a href="/blog">BLOG </a></li>
                    <li><a href="/contact-us">CONTACT US</a></li>
                    <li><a href="/adds-listing">Add Listing</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>