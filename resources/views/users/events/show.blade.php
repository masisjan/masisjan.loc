@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div>
        <h1 class="p_h1 ">{{ $event->title }}</h1>
        <div class="p_date_count">
            <span>{{ $event->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $event->count }} դիտում</span>
        </div>
        @if($event->image)
            <img src="{{ asset('storage/uploads/image/events/'. $event->image) }}" class="input-container" alt="">
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
        <div class="icon_footer"><hr>
            <p><i class="fas fa-flag"></i><strong> Միջոցառման կազմակերպիչ՝</strong> {{ $event->organizer }}</p>
            <p><i class="fas fa-clock"></i><strong> Ժամանակը՝</strong> սկիզբ․ {{ $event->date_start }} ավարտ․ {{ $event->date_end }}</p>
            <p><i class="fas fa-money-bill-wave"></i><strong> Արժեքը՝</strong> {{ $event->value }}</p>
        </div>
        <p class="p_post">{{ $event->text }}</p>
        <div id="map" style="height: 400px" class="margin_15_0"></div>
        <div class="clearfix">
            <div class="col col_6 col_md col_6_md icon_footer">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href="" class="block_non_md"><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col col_6 col_md col_6_md  p_date_count"><br>
                <i class="fas fa-user-circle"></i><a href=""> {{ $event->user->name }}</a><br>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.events.edit', $event->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.events.destroy', $event->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.events.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>
    <div class="block_non">
        <p class="cord0">{{ $event->cord0 }}</p>
        <p class="cord1">{{ $event->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>
@endsection
