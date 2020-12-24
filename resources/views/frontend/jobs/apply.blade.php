
@extends('layouts.frontend.app')

@section('styles')
@endsection


@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Apply Now</h2>
    </div>
</section>

<div class="container cta-100">

    <section class="job-detail-section">
        <div class="row">
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
                                    <a href="{{ $job->link }}" class="btn btn-view">View Job</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="job-detail-description">
                    <div class="job-detail-wrapper">
                        <div class="job-detail-wrapper-header">
                            <h4>Apply Now</h4>
                        </div>
                        <div class="job-detail-wrapper-body">
                            <form action="{{ $job->save_apply_url }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="attachment">Attachment</label>
                                            <input type="file" name="attachment" id="attachment" class="form-control">
                                            @error('attachment')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="comments">Comments</label>
                                            <textarea name="comments" id="comments" class="form-control" rows="5"></textarea>
                                            @error('comments')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-base">Submit</button>
                                    </div>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection