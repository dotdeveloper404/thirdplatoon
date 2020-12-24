<header>
    <div class="top-header">
        <div class="container">
            <div class="col-md-7">
                <ul class="social-ul-top">
                    <li><a href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i>twitter</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i>facebook</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-pinterest-p" aria-hidden="true"></i>pinterest</a>
                    </li>
                    <li><a href="javascript:void(0);"><i class="fa fa-youtube" aria-hidden="true"></i>Youtube</a></li>
                </ul>
            </div>

            <div class="col-md-5">
                <ul class="wish-ul text-right">
                    <li><a href="javascript:void(0);"><i class="fa fa-heart" aria-hidden="true"></i> wishlist</a></li>
                    <li>
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ route('login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Dashboard
                        </a>
                        @else
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <a href="{{ route('login') }}">Sign In</a> or <a href="{{ route('register') }}">Register</a>
                        @endif
                        @endif
                    </li>
                    <li>
                        @if (Route::has('login'))
                        @auth
                        <a href="javascript:void(0);" class="text-sm text-gray-700 underline"
                            onclick="jQuery('#authLogout').submit();">
                            <i class="fa fa-sign-out"></i>
                            Sign Out
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="authLogout">
                            @csrf
                        </form>
                        @endif
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">

            <div class="col-md-3 logo-area">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}">
                </a>
            </div>

            <div class="col-md-9 main-nav-area">
                <ul class="main-nav-ul">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about_us') }}">About us</a></li>
                    <li><a href="{{ route('ads.create') }}">Post ads</a></li>
                    <li><a href="{{ route('categories') }}">Categories</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog </a></li>
                    <li><a href="{{ route('contact_us') }}">Contact us</a></li>
                    <li><a href="{{ route('jobs.index') }}">Jobs Listing</a></li>
                    <li><a href="{{ route('ads.index') }}">Ads Listing</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>