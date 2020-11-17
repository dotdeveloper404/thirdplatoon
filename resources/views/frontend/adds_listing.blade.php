@extends('layouts.frontend.app')


@section('content')

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

@endsection