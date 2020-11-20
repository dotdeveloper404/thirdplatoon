@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Categories</h2>
    </div>
</section>
@if($categories->count())
    <section class="browse-categories main-section">
        <div class="container">
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
@endsection
