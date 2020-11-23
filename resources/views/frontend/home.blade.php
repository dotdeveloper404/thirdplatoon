@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Discover the</h2>
        <h2>Best Jobs For You</h2>
        <h5>Find great ooportunities, hire and post jobs</h5>
        <a href="#">SEE POSTS</a>
    </div>
</section>
<section class="form-area">
    <div class="container">
        <form>
            <input type="text" name="" placeholder="Enter Keyword">
            <select>
                <option>all categories</option>
                <option>category 1</option>
                <option>category 2</option>
                <option>category 3</option>
            </select>
            <input type="text" name="">
            <select>
                <option>select price rating</option>
                <option> 1</option>
                <option> 2</option>
                <option> 3</option>
            </select>
            <input type="submit" value="search">
        </form>
    </div>
</section>
<section class="about-sec">
    <div class="col-md-6 about-left">
        <img src="{{ asset('assets/images/sec2-1.png') }}">
    </div>
    <div class="col-md-6 about-right">
        <h2>ABOUT US</h2>
        <p>Nullam commodo dui ac pretium malesuada. Quisque eu consequat ligula. Curabitur at ante eros. Fusce
            maximus urna turpis, a commodo eros dapibus ac. Etiam nec tellus ullamcorper ante condimentum facilisis.
            Aenean nibh erat, accumsan non faucibus eu, aliquet id massa. Curabitur arcu ante, molestie ac odio at,
            laoreet eleifend metus. Praesent diam velit, efficitur id libero quis, lacinia hendrerit arcu llus
            ullamcorper ante condimentum.</p>
        <a href="{{ route('about_us') }}">READ MORE</a>
    </div>
</section>
<section class="featured">
    <div class="container">
        <h3>Featured Classified</h3>
        <div class="col-md-3">
            <img src="{{ asset('assets/images/home-sec3-1.png') }}" class="img-responsive">
            <p>Lawn Care</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('assets/images/sec2-2.png') }}" class="img-responsive">
            <p>Rent A Car</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('assets/images/sec2-3.png') }}" class="img-responsive">
            <p>Plumbing Services</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('assets/images/sec2-4.png') }}" class="img-responsive">
            <p>Carpenter</p>
        </div>
        <div class="see-btn">
            <a href="#">See More</a>
        </div>
    </div>
</section>
<section class="numbers-area">
    <div class="container">
        <div class="col-md-3">
            <h3>208</h3>
            <p>Listings</p>
        </div>
        <div class="col-md-3">
            <h3>334</h3>
            <p>Users</p>
        </div>
        <div class="col-md-3">
            <h3>59</h3>
            <p>Listing Type</p>
        </div>
        <div class="col-md-3">
            <h3>40+</h3>
            <p>Categories</p>
        </div>
    </div>
</section>
<section class="post-ad-sec">
    <div class="container">
        <div class="col-md-6 post-ad-left">
            <h3>Post an Ad</h3>
            <p>Aliquam ultricies, lectus at ultrices tempus, mauris nibh pellentesque augue, sed ullamcorper ante
                elit non dolor. Cras hendrerit dui leo, id sollicitudin purus blandit ac. Proin tincidunt sapien id
                nunc elementum dignissim. </p>
            <a href="{{ route('ads.create') }}">Create Ad</a>
        </div>
        <div class="col-md-6 post-ad-right">
            <h4>Featured Categories</h4>
            @if($featureds->count())
                <ul>
                    @foreach($featureds as $featured)
                        <li>{{ $featured->title }}</li>
                    @endforeach
                </ul>
            @endif
            <a href="{{ route('categories') }}">See More Categories</a>
        </div>
    </div>
</section>
@if($categories->count())
    <section class="browse-categories">
        <div class="container">
            <h3>Browse Categories</h3>
                @foreach($categories as $category)
                    <div class="col-md-2 browse-box">
                        <a href="{{ $category->path() }}">
                            <img src="{{ $category->image() }}">
                            <h4>{{ $category->title }}</h4>
                        </a>
                    </div>
                @endforeach
        </div>
    </section>
@endif
<section class="newsletter-area">
    <div class="container">
        <p>Subscribe to our</p>
        <div class="col-md-5">
            <h3>Newsletter</h3>
        </div>
        <div class="col-md-7">
            <form>
                <input type="email" name="">
                <input type="submit" name="" value="Submit">
            </form>
        </div>
    </div>
</section>
<section class="testimonial">
    <div class="container">
        <h3>Testimonials</h3>
        <div class="col-md-6 testi-bg">
            <img src="assets/images/testimonial-person.png">
            <p>I was very impresed by the laundry services lorem ipsum is simply free text available used by copy
                typing refreshing. Neque porro noting est qui dolorem ipsum quia.</p>
            <h5>Kevin Martin, <span>Customer</span></h5>
        </div>
        <div class="col-md-6 testi-bg">
            <img src="assets/images/testimonial-person.png">
            <p>I was very impresed by the laundry services lorem ipsum is simply free text available used by copy
                typing refreshing. Neque porro noting est qui dolorem ipsum quia.</p>
            <h5>Kevin Martin, <span>Customer</span></h5>
        </div>
    </div>
</section>
<section class="news-section">
    <div class="container">
        <h5>From the blog</h5>
        <h3>News & Articles</h3>
        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
        <div class="col-md-4">
            <img src="assets/images/home-sec7-1.png" class="img-responsive">
        </div>
        <div class="col-md-4">
            <img src="assets/images/home-sec7-2.png" class="img-responsive">
        </div>
        <div class="col-md-4">
            <img src="assets/images/home-sec7-3.png" class="img-responsive">
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="container">
        <div class="col-md-4 ">
            <div class="blog-text-area">
                <div class="col-md-10">
                    <ul>
                        <li>by Admin</li>
                        <li>2 Comments</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>23 oct</h5>
                </div>
                <h4>Lorem ipsum dolor sit amet 1550s and the typeing.</h4>
                <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="blog-text-area">
                <div class="col-md-10">
                    <ul>
                        <li>by Admin</li>
                        <li>2 Comments</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>23 oct</h5>
                </div>
                <h4>Lorem ipsum dolor sit amet 1550s and the typeing.</h4>
                <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="blog-text-area">
                <div class="col-md-10">
                    <ul>
                        <li>by Admin</li>
                        <li>2 Comments</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>23 oct</h5>
                </div>
                <h4>Lorem ipsum dolor sit amet 1550s and the typeing.</h4>
                <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum</p>
            </div>
        </div>
    </div>
</section>
@endsection
