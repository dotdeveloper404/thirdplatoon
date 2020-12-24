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
                                <form>
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="input-control" placeholder="e.g. Web Design" value="{{ request()->get('search') }}">
                                    </div>
                                </form>
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
                                    <ul class="meta-list">
                                        @foreach($categories as $category)
                                            <li class="{{ ($category->id == $job_category->id) ? 'active' : '' }}"><a href="{{ $category->link }}">{{ $category->title }} ({{ $category->jobs()->ApplicationAvail()->count() }})</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                                {{-- @if($categories->count())
                                    @foreach($categories as $category)
                                    <div class="input-group">
                                        <label class="input-checkbox-label">
                                            <input type="checkbox" name="category[]" class="input-checkbox"
                                                value="{{ $category->slug }}">
                                            <span>{{ $category->title }} ({{ $category->jobs->count() }})</span>
                                        </label>
                                    </div>
                                    @endforeach
                                    
                                @endif --}}
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
                                Showing {{ $jobs->firstItem() ?? 0 }} – {{ $jobs->lastItem() ?? 0 }} of {{ $jobs->total() ?? 0 }} results
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="jobs-filters">
                                <form>
                                    <div class="input-group input-group-inline">
                                        <label>Sort by:</label>
                                        <select name="orderby" id="orderby" class="input-control" onchange="this.form.submit()">
                                            <option value="">Default</option>
                                            <option value="newest" {{ request()->get('orderby') == 'newest' ? 'selected' : '' }}>Newest</option>
                                            <option value="oldest" {{ request()->get('orderby') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jobs-listing">
                    @if($jobs->count())
                        @foreach($jobs as $job)
                            <div class="job-block">
                                <div class="job-block-head">
                                    <div class="job-block-employer-header">
                                        <div class="job-block-employer-logo">
                                            <img src="{{ $job->company_logo_path }}" alt="{{ $job->company_name }}"
                                                title="{{ $job->company_name }}">
                                        </div>
                                        <div class="job-block-title-wrapper">
                                            <span class="label label-primary">{{ $job->category->title }}</span>
                                            <h3 class="job-block-employer-title"><a href="{{ $job->link }}">{{ $job->company_name }}</a></h3>
                                            <h4 class="job-block-title">{{ $job->designation }}</h4>
                                        </div>
                                    </div>
                                    @if($job->featured)
                                        <a href="javascript:;" class="job-block-featured" data-toggle="tooltip" data-placement="left" title="Featured"><i class="fa fa-star"></i></a>
                                    @endif
                                    @if($job->urgent)
                                        <div class="job-block-urgent-label">Urgent</div>
                                    @endif                                        
                                </div>
                                <div class="job-block-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="job-block-information">
                                                <p><strong>Deadline date:</strong> <span>{{ $job->deadline_date }}</span></p>
                                                <p><strong>Job Type:</strong> <span class="text-green">{{ $job->type }}</span></p>
                                                <p><strong>Location:</strong> <span>{{ $job->location }}</span></p>
                                                <p><strong>Salary:</strong> <span>{{ $job->pay_start_format }} – {{ $job->pay_end_format }} {{ $job->pay_per }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="job-block-btns">
                                                <div class="job-block-deadline-time">Application ends: <strong>{{ $job->deadline_date }}</strong></div>
                                                @if($job->application_ends)
                                                    @if($job->job_user)
                                                        <div class="text-center">
                                                            <strong class="text-info">Already Applied</strong>
                                                        </div>
                                                        <br>
                                                    @else
                                                        <a href="{{ $job->apply_url }}" class="btn btn-apply">Apply Now</a>
                                                    @endif
                                                @endif
                                                <a href="{{ $job->link }}" class="btn btn-view">View Job</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $jobs->links('vendor.pagination.pagination') }}
                    @else   
                        <div class="alert alert-info">No Jobs Found!</div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</div>
@endsection