@extends('layouts.frontend.app')

@section('styles')
@endsection


@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Blog</h2>
    </div>
</section>

<div class="container cta-100">

    <section class="blog-wrap">
        @if($posts->count())
            <div class="posts-wrap">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <article class="article-box">
                                <div class="article-img">
                                    <a href="{{ $post->link }}"><img src="{{ $post->image_path }}" alt="{{ $post->title }}" title="{{ $post->title }}"></a>
                                </div>
                                <div class="article-content">
                                    <div class="article-category">{{ $post->category->title }}</div>
                                    <h3><a href="{{ $post->link }}">{{ $post->title }}</a></h3>
                                    <p>{{ $post->excerpt }}</p>
                                    <div class="article-date">{{ $post->created_at->format('d M Y') }}</div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="paginate-wrap">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-danger">
                No Record Found!
            </div>
        @endif
    </section>

</div>
@endsection