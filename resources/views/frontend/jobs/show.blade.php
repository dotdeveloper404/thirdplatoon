
@extends('layouts.frontend.app')

@section('styles')
@endsection


@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Job Details</h2>
    </div>
</section>

<div class="container cta-100">

    <section class="job-detail-section">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('msg'))
                    @if(session()->get('msg')['type'] == 'success')
                        <div class="alert alert-success">{{ session()->get('msg')['text'] }}</div>
                    @endif
                    @if(session()->get('msg')['type'] == 'error')
                        <div class="alert alert-danger">{{ session()->get('msg')['text'] }}</div>
                    @endif
                @endif
            </div>
            <div class="col-md-12">
                <div class="job-detail-header">
                    <div class="job-detail-employer-header-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="job-detail-employer-header">
                                    <div class="job-detail-employer-logo">
                                        <img src="{{ $job->company_logo_path }}" alt="{{ $job->company_name }}"
                                                title="{{ $job->company_name }}">
                                    </div>
                                    <div class="job-detail-title-wrapper">
                                        <span class="label label-primary">{{ $job->category->title }}</span>
                                        <h1 class="job-detail-employer-title">{{ $job->company_name }}</h1>
                                        <h3 class="job-detail-title">{{ $job->designation }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="job-detail-btns">
                                    <div class="job-detail-deadline-time">Application ends: <strong>{{ $job->deadline_date }}</strong></div>
                                    @if($job->application_ends)
                                        @if($job->job_user)
                                            <strong class="text-info">Already Applied</strong>
                                        @else
                                            <a href="{{ $job->apply_url }}" class="btn btn-apply">Apply Now</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-detail-information">
                        <p><strong>Country:</strong> <span>{{ $job->country }}</span></p>
                        <p><strong>Location:</strong> <span>{{ $job->location }}</span></p>
                        <p><strong>Phone Number:</strong> <span>{{ $job->phone_number }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $job->email }}</span></p>
                        <p><strong>Deadline date:</strong> <span>{{ $job->deadline_date }}</span></p>
                        <p><strong>Job Type:</strong> <span class="text-green">{{ $job->type }}</span></p>
                        <p><strong>Shift:</strong> <span class="text-capitalize">{{ $job->shift }}</span></p>
                        <p><strong>Salary:</strong> <span>{{ $job->pay_start_format }} – {{ $job->pay_end_format }} {{ $job->pay_per }}</span></p>
                        <p><strong>Experience:</strong> <span>{{ $job->experience }}</span></p>
                        <p><strong>Designation:</strong> <span>{{ $job->designation }}</span></p>
                        <p><strong>Qualification:</strong> <span>{{ $job->qualification }}</span></p>
                    </div>                  
                </div>
                <div class="job-detail-description">
                    <div class="job-detail-wrapper">
                        <div class="job-detail-wrapper-header">
                            <h4>Overview</h4>
                        </div>
                        <div class="job-detail-wrapper-body">
                            {!! $job->description !!}
                        </div>
                    </div>
                    <div class="job-detail-wrapper">
                        <div class="job-detail-wrapper-header">
                            <h4>Requirements</h4>
                        </div>
                        <div class="job-detail-wrapper-body">
                            {!! $job->requirements !!}
                        </div>
                    </div>
                    <div class="job-detail-wrapper">
                        <div class="job-detail-wrapper-header">
                            <h4>Allownces</h4>
                        </div>
                        <div class="job-detail-wrapper-body">
                            {!! $job->allownces !!}
                        </div>
                    </div>
			    </div>
            </div>
        </div>
    </section>

</div>
@endsection