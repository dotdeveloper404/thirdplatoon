@extends('layouts.frontend.app')
@section('content')

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
            <a href="#">Create Ad</a>
        </div>
        <div class="col-md-6 post-ad-right">
            <h4>Featured Listings</h4>
            <ul>
                <li>Business Loans</li>
                <li>Job Opportunities</li>
                <li>Spa</li>
                <li>Salon</li>
                <li>Rent a House</li>
                <li>Plumbing</li>
                <li>Electrician</li>
                <li>Tutor</li>
                <li>Cars</li>
                <li>Fast Food</li>
                <li>Remodeling Services</li>
            </ul>
            <a href="#">See More listings</a>
        </div>
    </div>
</section>

<section class="browse-categories">
    <div class="container">
        <h3>Browse Categories</h3>

        <div class="col-md-2 browse-box">
            <img src="assets/images/ico-1.png">
            <h4>Business</h4>
        </div>

        <div class="col-md-2 browse-box">
            <img src="assets/images/ico-2.png">
            <h4>Cars </h4>
        </div>

        <div class="col-md-2 browse-box">
            <img src="assets/images/ico-3.png">
            <h4>Hotels</h4>
        </div>

        <div class="col-md-2 browse-box">
            <img src="assets/images/ico-4.png">
            <h4>Food</h4>
        </div>

        <div class="col-md-2 browse-box">
            <img src="assets/images/ico-5.png">
            <h4>Jobs</h4>
        </div>

        <div class="col-md-2 browse-box">
            <img src="assets/images/ico-6.png">
            <h4>Services</h4>
        </div>
    </div>
</section>

@endsection