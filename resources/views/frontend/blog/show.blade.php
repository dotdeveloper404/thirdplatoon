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
        <div class="single-post-wrap">
            <article class="sarticle-box">
                @if($post->image)
                    <div class="sarticle-img">
                        <img src="{{ $post->image_path }}" alt="{{ $post->title }}" title="{{ $post->title }}">
                    </div>
                @endif
                <div class="sarticle-content">
                    <div class="sarticle-meta">
                        <ul class="list-unstyled">
                            <li><i class="fa fa-clock-o"></i><span>{{ $post->created_at->format('d M Y') }}</span></li>
                            <li><i class="fa fa-tag"></i><span>{{ $post->category->title }}</span></li>
                        </ul>
                    </div>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
                </div>
            </article>
        </div>
    </section>

</div>
@endsection