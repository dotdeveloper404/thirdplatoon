@extends('layouts.frontend.app')

@section('styles')
<style>
    .ad-box {
        overflow: hidden !important;
    }

    .job-block-urgent-label {
        padding: 7px 54px !important;
    }
</style>
@endsection
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Ad - {{$ad->title}}</h2>
    </div>
</section>
<section class="main-section">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="ad-box" style="">
                    <div class="row">
                        <div class="col-md-4">

                            <img src="{{ $ad->image_path }}" alt="{{ $ad->title }}"
                                class="img-responsive img-thumbnail">
                        </div>

                        <div class="col-md-8">

                            <span class="label label-success">{{ ucwords($ad->category->title) }}</span>
                            <div style="{{$ad->is_featured==1 ? 'display:block' : 'display:none;'}}"
                                class="job-block-urgent-label">{{$ad->is_featured==1 ? 'Featured' : ''}}</div>
                            <h4>{{ ucwords($ad->title) }}</h4>

                            <hr />
                            Detail
                            <p>{{ $ad->description }}</p>
                            <hr>
                            <div class="text-right">
                                <a href="javascript:;"
                                    class="btn btn-base btn-sm"><strong>{{ currency_symbol() }}{{ $ad->price() }}</strong></a>

                            </div>
                            <div>
                                <a data-toggle="modal" data-target="#contactModal" class="btn btn-apply btn-primary"
                                    href="javascript:;">Contact </a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Ad Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('ads.contact',$ad->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Name:</label>
                        <input required type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email Address:</label>
                        <input required type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Phone:</label>
                        <input required type="text" name="phone" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea required name="description" class="form-control" id="message-text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send message</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


@endsection