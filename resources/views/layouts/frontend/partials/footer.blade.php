<footer>
    <div class="container">
        <div class="col-md-3">
            <img src="{{ asset('assets/images/logo.png') }}" class="img-responsive">
        </div>
        <div class="col-md-3">
            <h4>Need Help</h4>
            <ul>
                <li>Call us on (616) 375 2513</li>
                <li>Email: info@th3rdplatoon.com</li>
            </ul>
        </div>
        <div class="col-md-3">
            <h4>Quick Links</h4>
            <ul class="quick-ul">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about_us') }}">About Us</a></li>
                <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                <li><a href="{{ route('categories') }}">Categories</a></li>
                <li><a href="{{ route('ads.create') }}">Post Ads</a></li>
                <li><a href="/blog">Blog </a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h4>Get Social With Us</h4>
            <ul class="footer-social">
                <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                <li><i class="fa fa-linkedin-square" aria-hidden="true"></i></li>
                <li><i class="fa fa-pinterest-p" aria-hidden="true"></i></li>
                <li><i class="fa fa-google-plus-official" aria-hidden="true"></i></li>
            </ul>
        </div>
        <section class="copyright">
            <div class="col-md-6">
                <p>© Copyright 2020 Th3rdPlatoon. All Rights Reserved</p>
            </div>
            <div class="col-md-6">
                <ul class="foot-ul">
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </section>
    </div>
</footer>