@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div>
        <h1 class="p_h1 ">{{ $taxi->title }}</h1>
        <div class="p_date_count">
            <span>{{ $taxi->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $taxi->count }} դիտում</span>
        </div>
        @if($taxi->image)
            <img src="{{ asset('storage/uploads/image/taxis/'. $taxi->image) }}" class="input-container" alt="">
        @else
            <img src="{{ asset('image/app/default-taxi.jpg') }}" class="input-container" alt="">
        @endif
        <div class="icon_footer">
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-telegram-plane"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-youtube"></i></a>
        </div><hr>
        <div class="clearfix">
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Կոնտակտային տվյալներ</p>
                <i class="fas fa-user-circle"></i><span><strong>Ղեկավար՝</strong> {{ $taxi->director }}</span><br>
                <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> {{ $taxi->address }}</span><br>
                <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:{{ $taxi->phone }}"> {{ $taxi->phone }}</a></span><br>
                <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> {{ $taxi->email }}</span><br>
                <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="{{ $taxi->site }}"> {{ $taxi->site }}</a></span><br>
                <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="{{ $taxi->fb }}"> {{ $taxi->fb }}</a></span><br>
            </div>
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Աշխատանքային օրեր, ժամեր</p>
                <i class="fas circle">1</i><span><strong>Երկուշաբթի՝</strong> {{ $taxi->monday }}</span><br>
                <i class="fas circle">2</i><span><strong>Երեքշաբթի՝</strong> {{ $taxi->tuesday }}</span><br>
                <i class="fas circle">3</i><span><strong>Չորեքշաբթի՝</strong> {{ $taxi->wednesday }}</span><br>
                <i class="fas circle">4</i><span><strong>Հինգշաբթի՝</strong> {{ $taxi->thursday }}</span><br>
                <i class="fas circle">5</i><span><strong>Ուրբաթ՝</strong> {{ $taxi->friday }}</span><br>
                <i class="fas circle">6</i><span><strong>Շաբաթ՝</strong> {{ $taxi->saturday }}</span><br>
                <i class="fas circle">7</i><span><strong>Կիրակի՝</strong> {{ $taxi->sunday }}</span><br>
            </div>
        </div>
        <div id="map" style="height: 400px" class="margin_15_0"></div>
        <p class="p_post">{{ $taxi->text }}</p>
        <div class="clearfix">
            <div class="icon_footer">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href="" class="block_non_md"><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.taxis.edit', $taxi->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.taxis.destroy', $taxi->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.taxis.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>
    <div class="block_non">
        <p class="cord0">{{ $taxi->cord0 }}</p>
        <p class="cord1">{{ $taxi->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>

@endsection
