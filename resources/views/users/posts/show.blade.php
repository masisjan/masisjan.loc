@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="col col_4 col_md col_4_md">
        @if($post->publish == "yes")
            <p class="p_post bg_save">Հրապարակված՝ {{ $post->publish }}</p>
        @else
            <p class="p_post bg_delete">Հրապարակված՝ {{ $post->publish }}</p>
        @endif
    </div>
    <div class="col col_4 col_md col_4_md">
        @if($post->confirm == "yes")
            <p class="p_post bg_save">Հաստատված՝ {{ $post->confirm }}</p>
        @else
            <p class="p_post bg_delete">Հաստատված՝ {{ $post->confirm }}</p>
        @endif
    </div>
    <div class="col col_4 col_md col_4_md">
        <p class="p_post bg_edit">ID. Համար՝ {{ $post->id }}</p>
    </div>
    <p class="p_date_count">Նորության հղումը՝ <a href="{{ asset('news/'. $post->id) }}"> {{ asset('news/'. $post->id) }}</a></p>
    <hr>
    <div>
        <h1 class="p_h1">{{ $post->title }}</h1>
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
            <a href=""><i class="fab fa-telegram-plane"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        @if($post->word)
            <div class="width_80 p_citat clearfix">
                <i class="fas fa-angle-double-left"></i><span>{{ $post->word }}</span><i class="fas fa-angle-double-right"></i>
            </div>
        @endif
        <p class="p_post">{{ $post->text }}</p>
        @if($post->text_video)
        <iframe src="{{ $post->text_video}}" class="p_video" scrolling="no" frameborder="0" allowfullscreen="true"
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true">
        </iframe>
        @endif
        @if($post->images)
            <div class="col clearfix">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/uploads/image/posts/' . $image) }}" class="col_6 img_map" alt="">
                @endforeach
            </div>
        @endif
        <div class="clearfix">
            <div class="col col_6 col_md col_6_md icon_footer">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <div class="col col_6 col_md col_6_md  p_date_count"><br>
                <i class="fas fa-user-circle"></i><a href=""> {{ $post->user->name }}</a><br>
                @if($post->post_url)
                <i class="fas fa-step-forward"></i><a href="{{ $post->post_url }}"> {{ $post_url }}</a>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.posts.edit', $post->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.posts.destroy', $post->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.posts.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>

@endsection
