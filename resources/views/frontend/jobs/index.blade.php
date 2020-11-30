
@extends('layouts.frontend.app')

@section('styles')
@endsection


@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Jobs Listing</h2>
    </div>
</section>

<div class="container cta-100">

    <section class="jobs-wrapper">
        <div class="row">
            <div class="col-md-4">
                <aside class="jobs-sidebar">
                    <div class="meta-box">
                        <div class="meta-head">
                            <h3><a href="#search-keywords" data-toggle="collapse" aria-expanded="true">Search Keywords</a></h3>
                        </div>
                        <div class="meta-body collapse in" id="search-keywords">
                            <div class="meta-inner-wrap">
                                <div class="input-group">
                                    <input type="text" name="s" id="s" class="input-control" placeholder="e.g. Web Design">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meta-box">
                        <div class="meta-head">
                            <h3><a href="#category" data-toggle="collapse" aria-expanded="true">Category</a></h3>
                        </div>
                        <div class="meta-body collapse in" id="category">
                            <div class="meta-inner-wrap">
                                @if($categories->count())
                                    @foreach($categories as $category)
                                        <div class="input-group">
                                            <label class="input-checkbox-label">
                                                <input type="checkbox" name="category[]" class="input-checkbox" value="{{ $category->slug }}">
                                                <span>{{ $category->title }} ({{ $category->jobs->count() }})</span>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="meta-box">
                        <div class="meta-head">
                            <h3><a href="#location-list" data-toggle="collapse" aria-expanded="true">Location list</a></h3>
                        </div>
                        <div class="meta-body collapse in" id="location-list">
                            <div class="meta-inner-wrap">
                                <div class="input-group">
                                    <label class="input-checkbox-label">
                                        <input type="checkbox" name="country[]" class="input-checkbox" value="London">
                                        <span>London (1)</span>
                                    </label>
                                </div>
                                <div class="input-group">
                                    <label class="input-checkbox-label">
                                        <input type="checkbox" name="country[]" class="input-checkbox" value="New York">
                                        <span>New York (13)</span>
                                    </label>
                                </div>
                                <div class="input-group">
                                    <label class="input-checkbox-label">
                                        <input type="checkbox" name="country[]" class="input-checkbox" value="Paris">
                                        <span>Paris (2)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meta-box">
                        <div class="meta-head">
                            <h3><a href="#job-type" data-toggle="collapse" aria-expanded="true">Job Type</a></h3>
                        </div>
                        <div class="meta-body collapse in" id="job-type">
                            <div class="meta-inner-wrap">
                                @if(job_types())
                                    @foreach(job_types() as $job_type)
                                        <div class="input-group">
                                            <label class="input-radio-label">
                                                <input type="radio" name="job_type[]" class="input-radio" value="{{ $job_type }}">
                                                <span>{{ str_format($job_type) }} </span>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="meta-box">
                        <div class="meta-head">
                            <h3><a href="#salary" data-toggle="collapse" aria-expanded="true">Salary</a></h3>
                        </div>
                        <div class="meta-body collapse in" id="salary">
                            <div class="meta-inner-wrap">
                                @if(pay_types())
                                    @foreach(pay_types() as $pay_type)
                                        <div class="input-group">
                                            <label class="input-radio-label">
                                                <input type="radio" name="pay_type[]" class="input-radio" value="{{ $pay_type }}">
                                                <span>{{ str_format($pay_type) }} </span>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="meta-box">
                        <div class="meta-head">
                            <h3><a href="#date-posted" data-toggle="collapse" aria-expanded="true">Date Posted</a></h3>
                        </div>
                        <div class="meta-body collapse in" id="date-posted">
                            <div class="meta-inner-wrap">
                                @if(posted_dates())
                                    @foreach(posted_dates() as $key => $posted_date)
                                        <div class="input-group">
                                            <label class="input-radio-label">
                                                <input type="radio" name="posted_date[]" class="input-radio" value="{{ $key }}">
                                                <span>{{ $posted_date }} </span>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-md-8">
                <div class="jobs-head">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="jobs-results">
                                Showing 1 – 8 of 16 results
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="jobs-filters">
                                <form>
                                    <div class="input-group input-group-inline">
                                        <label>Sort by:</label>
                                        <select name="orderby" id="orderby" class="input-control">
                                            <option value="">Default</option>
                                            <option value="newest">Newest</option>
                                            <option value="oldest">Oldest</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jobs-listing">
                    <div class="job-block">
                        <div class="job-block-head">
                            <div class="job-block-employer-header">
                                <div class="job-block-employer-logo">
                                    <img src="{{ asset('assets/images/logo1.jpg') }}" alt="Redesign Co" title="Redesign Co">
                                </div>
                                <div class="job-block-title-wrapper">
                                    <h3 class="job-block-employer-title"><a href="{{ route('jobs.show', ['123']) }}">Redesign Co</a></h3>
                                    <h4 class="job-block-title">Product Design</h4>
                                </div>
                            </div>
                            <a href="#" class="job-block-featured" data-toggle="tooltip" data-placement="left" title="Featured"><i class="fa fa-star"></i></a>
                            <div class="job-block-urgent-label">Urgent</div>
                        </div>
                        <div class="job-block-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="job-block-information">
                                        <p><strong>Deadline date:</strong> <span>June 25, 2022</span></p>
                                        <p><strong>Job Type:</strong> <span class="text-green">Internship</span></p>
                                        <p><strong>Location:</strong> <span>803 46th St Brooklyn, NY</span></p>
                                        <p><strong>Salary:</strong> <span>$40 – $45 per month</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="job-block-btns">
                                        <div class="job-block-deadline-time">Application ends: <strong>June 25, 2022</strong></div>
                                        <a href="javascript:void(0);" class="btn btn-apply">Apply Now</a>
                                        <a href="{{ route('jobs.show', ['123']) }}" class="btn btn-view">View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-block">
                        <div class="job-block-head">
                            <div class="job-block-employer-header">
                                <div class="job-block-employer-logo">
                                    <img src="{{ asset('assets/images/logo2.jpg') }}" alt="CoderBold ALT" title="CoderBold ALT">
                                </div>
                                <div class="job-block-title-wrapper">
                                    <h3 class="job-block-employer-title"><a href="{{ route('jobs.show', ['123']) }}">CoderBold ALT</a></h3>
                                    <h4 class="job-block-title">Product Mockup</h4>
                                </div>
                            </div>
                            <div class="job-block-urgent-label">Urgent</div>
                        </div>
                        <div class="job-block-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="job-block-information">
                                        <p><strong>Deadline date:</strong> <span>June 24, 2022</span></p>
                                        <p><strong>Job Type:</strong> <span class="text-default">Contract Base</span></p>
                                        <p><strong>Location:</strong> <span>18 Brooklyn, NY</span></p>
                                        <p><strong>Salary:</strong> <span>$20 – $35 per hour</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="job-block-btns">
                                        <div class="job-block-deadline-time">Application ends: <strong>June 24, 2022</strong></div>
                                        <a href="javascript:void(0);" class="btn btn-apply">Apply Now</a>
                                        <a href="{{ route('jobs.show', ['123']) }}" class="btn btn-view">View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-block">
                        <div class="job-block-head">
                            <div class="job-block-employer-header">
                                <div class="job-block-employer-logo">
                                    <img src="{{ asset('assets/images/logo3.jpg') }}" alt="Go Technologies" title="Go Technologies">
                                </div>
                                <div class="job-block-title-wrapper">
                                    <h3 class="job-block-employer-title"><a href="{{ route('jobs.show', ['123']) }}">Go Technologies</a></h3>
                                    <h4 class="job-block-title">WordPress Developer</h4>
                                </div>
                            </div>
                            <div class="job-block-urgent-label">Urgent</div>
                        </div>
                        <div class="job-block-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="job-block-information">
                                        <p><strong>Deadline date:</strong> <span>June 24, 2022</span></p>
                                        <p><strong>Job Type:</strong> <span class="text-green">Internship</span></p>
                                        <p><strong>Location:</strong> <span>1547-1519 Cropsey Ave Brooklyn</span></p>
                                        <p><strong>Salary:</strong> <span>$18 – $20 per month</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="job-block-btns">
                                        <div class="job-block-deadline-time">Application ends: <strong>June 24, 2022</strong></div>
                                        <a href="javascript:void(0);" class="btn btn-apply">Apply Now</a>
                                        <a href="{{ route('jobs.show', ['123']) }}" class="btn btn-view">View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-block">
                        <div class="job-block-head">
                            <div class="job-block-employer-header">
                                <div class="job-block-employer-logo">
                                    <img src="{{ asset('assets/images/logo4.jpg') }}" alt="Win Developer" title="Win Developer">
                                </div>
                                <div class="job-block-title-wrapper">
                                    <h3 class="job-block-employer-title"><a href="{{ route('jobs.show', ['123']) }}">Win Developer</a></h3>
                                    <h4 class="job-block-title">Web Maintenence</h4>
                                </div>
                            </div>
                            <div class="job-block-urgent-label">Urgent</div>
                        </div>
                        <div class="job-block-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="job-block-information">
                                        <p><strong>Deadline date:</strong> <span>June 28, 2022</span></p>
                                        <p><strong>Job Type:</strong> <span class="text-green">Internship</span></p>
                                        <p><strong>Location:</strong> <span>6716 10th Ave Brooklyn, NY</span></p>
                                        <p><strong>Salary:</strong> <span>$5 – $10 per hour</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="job-block-btns">
                                        <div class="job-block-deadline-time">Application ends: <strong>June 28, 2022</strong></div>
                                        <a href="javascript:void(0);" class="btn btn-apply">Apply Now</a>
                                        <a href="{{ route('jobs.show', ['123']) }}" class="btn btn-view">View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-block">
                        <div class="job-block-head">
                            <div class="job-block-employer-header">
                                <div class="job-block-employer-logo">
                                    <img src="{{ asset('assets/images/logo5.jpg') }}" alt="DG Company" title="DG Company">
                                </div>
                                <div class="job-block-title-wrapper">
                                    <h3 class="job-block-employer-title"><a href="{{ route('jobs.show', ['123']) }}">DG Company</a></h3>
                                    <h4 class="job-block-title">Photoshop Designer</h4>
                                </div>
                            </div>
                            <div class="job-block-urgent-label">Urgent</div>
                        </div>
                        <div class="job-block-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="job-block-information">
                                        <p><strong>Deadline date:</strong> <span>June 17, 2022</span></p>
                                        <p><strong>Job Type:</strong> <span class="text-orange">Part Time</span></p>
                                        <p><strong>Location:</strong> <span>933 55th St Brooklyn, NY</span></p>
                                        <p><strong>Salary:</strong> <span>$25 – $35 per hour</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="job-block-btns">
                                        <div class="job-block-deadline-time">Application ends: <strong>June 17, 2022</strong></div>
                                        <a href="javascript:void(0);" class="btn btn-apply">Apply Now</a>
                                        <a href="{{ route('jobs.show', ['123']) }}" class="btn btn-view">View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection