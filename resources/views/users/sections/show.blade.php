@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="col col_6 col_md col_6_md">
        @if($section->publish == "yes")
            <p class="p_post bg_save">Հրապարակված՝ {{ $section->publish }}</p>
        @else
            <p class="p_post bg_delete">Հրապարակված՝ {{ $section->publish }}</p>
        @endif
    </div>
    <div class="col col_6 col_md col_6_md">
        <p class="p_post bg_edit">ID. Համար՝ {{ $section->id }}</p>
    </div>
    <p class="p_date_count">Հղումը՝ <a href="{{ asset('sections/'. $section->id) }}"> {{ asset('sections/'. $section->id) }}</a></p>
    <hr>
    <div>
        <h1 class="p_h1">{{ $section->title }}</h1>
        <div class="p_date_count">
            <span>{{ $section->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $section->count }} դիտում</span>
        </div>
        @if($section->image)
            <img src="{{ asset('storage/uploads/image/sections/'. $section->image) }}" class="input-container" alt="">
        @else
            <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container" alt="">
        @endif
        <div class="icon_footer">
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-telegram-plane"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        <p class="p_post">{{ $section->text }}</p>
        @if($section->images)
            <div class="col clearfix">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/uploads/image/sections/' . $image) }}" class="col_6 img_map" alt="">
                @endforeach
            </div>
        @endif
    </div>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.sections.edit', $section->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.sections.destroy', $section->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.sections.index', $tab) }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>

@endsection
