@extends('layouts.main')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="padding_head container container_md container_sm clearfix b_border b_border_sm">
        <div class="col col_9 col_md col_9_md">
            <h1 class="p_h1 ">{{ $post->title }}</h1>
            <div class="p_date_count">
                <span>{{ $post->created_at }} </span>
                <i class="fa fa-eye margin_left_3"></i><span> {{ $post->count }} դիտում</span>
            </div>
            @if($post->image)
                <img src="{{ asset('storage/uploads/image/posts/'. $post->image) }}" class="input-container" alt="">
            @else
                <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container" alt="">
            @endif
            <div class="icon_footer">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
            </div>
            @if($post->word)
                <div class="width_80 p_citat clearfix">
                    <i class="fas fa-angle-double-left"></i><span>{{ $post->word }}</span><i class="fas fa-angle-double-right"></i>
                </div>
            @endif
            <p class="p_post">{{ $post->text }}</p>
            @if($post->images)
                <div class="clearfix margin_15_0">
                    @foreach ($images as $image)
                        <div class="col col_6 col_md col_6_md click-zoom relative">
                            <label>
                                <input type="checkbox">
                                <img src="{{ asset('storage/uploads/image/posts/' . $image) }}" class="img_map border" alt="">
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif
            @if($post->text_video)
                <iframe src="{{ $post->text_video}}" class="p_video" scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true">
                </iframe>
            @endif
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href="" class="block_non_md"><i class="fab fa-telegram-plane"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
                <div class="col col_6 col_md col_6_md  p_date_count"><br>
                    <i class="fas fa-user-circle"></i><a href=""> {{ $post->user->name }}</a><br>
                    @if($post->post_url)
                        <i class="fas fa-step-forward"></i><a href="{{ $post->post_url }}"> {{ $post_url }}</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col col_3 col_md col_3_md">
        </div>
    </div>
    @if($posts->count())
        <div class="container container_md container_sm news_h clearfix">
            <h3 class="margin_15_0 margin_left_3">Վերջին նորությունները</h3>
            @foreach($posts as $post)
                <a href="{{ route('news.show', $post->id) }}">
                    <div class="col col_4 col_md col_6_md">
                        @if($post->image)
                            <img src="{{ asset('storage/uploads/image/posts/'. $post->image) }}" class="input-container p_b_img" alt="">
                        @else
                            <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container p_b_img" alt="">
                        @endif
                        <h3 class="padding_lr_15"> {{ $post->title }} </h3>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

@endsection
