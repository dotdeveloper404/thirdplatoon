@extends('layouts.frontend.app')

@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Ads</h2>
    </div>
</section>
<section class="main-section">
    <div class="container">
        @if(session()->has('msg'))
        @if(session()->get('msg')['type'] == 'success')
        <div class="alert alert-success">{{ session()->get('msg')['text'] }}</div>
        @endif
        @if(session()->get('msg')['type'] == 'error')
        <div class="alert alert-danger">{{ session()->get('msg')['text'] }}</div>
        @endif
        @endif
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('ads.index') }}" method="GET">
                    <div class="filter-box main-panel">
                        <div class="main-head">
                            <h3>Search Filters</h3>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="search">Search</label>
                            <input type="text" name="search" id="search" placeholder="Search...." class="form-control"
                                value="{{ request()->get('search') }}">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @if($categories->count())
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                                    {{ ucwords($category->title) }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="min_price">Price</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" name="min_price" id="min_price" placeholder="Min Price" class="form-control" value="{{ request()->get('min_price') }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="max_price" id="max_price" placeholder="Max Price" class="form-control" value="{{ request()->get('max_price') }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-base">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                @if($ads->count())
                @foreach($ads as $ad)
                <div class="ad-box">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $ad->image() }}" alt="{{ $ad->title }}" class="img-responsive img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <span class="label label-success">{{ ucwords($ad->category->title) }}</span>
                            <h4>{{ ucwords($ad->title) }}</h4>
                            <strong class="text-danger">{{ currency_symbol() }}{{ $ad->price() }}</strong>
                            <br><br>
                            <p>{{ substr($ad->description, 0, 50) }}..</p>
                            <hr>
                            <div class="text-right">
                                <a href="{{ $ad->link}}" class="btn btn-base btn-sm">More Details</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach
                <div>
                    {{ $ads->links() }}
                </div>
                @else
                <div class="well">No Ads Found!</div>
                @endif
            </div>
        </div>
    </div>
</section>


@endsection