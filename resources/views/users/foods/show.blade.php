@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div>
        <h1 class="p_h1 ">{{ $food->title }}</h1>
        <div class="p_date_count">
            <span>{{ $food->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $food->count }} դիտում</span>
        </div>
        @if($food->image)
            <img src="{{ asset('storage/uploads/image/foods/'. $food->image) }}" class="input-container" alt="">
        @else
            <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container" alt="">
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
                <i class="fas fa-user-circle"></i><span><strong>Ղեկավար՝</strong> {{ $food->director }}</span><br>
                <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> {{ $food->address }}</span><br>
                <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:{{ $food->phone }}"> {{ $food->phone }}</a></span><br>
                <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> {{ $food->email }}</span><br>
                <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="{{ $food->site }}"> {{ $food->site }}</a></span><br>
                <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="{{ $food->fb }}"> {{ $food->fb }}</a></span><br>
            </div>
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Աշխատանքային օրեր, ժամեր</p>
                <i class="fas circle">1</i><span><strong>Երկուշաբթի՝</strong> {{ $food->monday }}</span><br>
                <i class="fas circle">2</i><span><strong>Երեքշաբթի՝</strong> {{ $food->tuesday }}</span><br>
                <i class="fas circle">3</i><span><strong>Չորեքշաբթի՝</strong> {{ $food->wednesday }}</span><br>
                <i class="fas circle">4</i><span><strong>Հինգշաբթի՝</strong> {{ $food->thursday }}</span><br>
                <i class="fas circle">5</i><span><strong>Ուրբաթ՝</strong> {{ $food->friday }}</span><br>
                <i class="fas circle">6</i><span><strong>Շաբաթ՝</strong> {{ $food->saturday }}</span><br>
                <i class="fas circle">7</i><span><strong>Կիրակի՝</strong> {{ $food->sunday }}</span><br>
            </div>
        </div>
        <div id="map" style="height: 400px" class="margin_15_0"></div>
        <p class="p_post">{{ $food->text }}</p>
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
        <a href="{{ route('users.foods.edit', $food->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.foods.destroy', $food->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.foods.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>
    <hr>
    @include('api._cucanak')
    <form action="{{ route('tablichka.email') }}" method="post">
        @csrf
        <input type="hidden" value="{{ asset('storage/uploads/image/qr/'. $food->qr_cod) }}" name="image_qr">
        <input type="hidden" value="{{ $food->title }}" name="title">
        <span>Պատվիրել ցուցանակը Գիլոյան ընկերությունում ? &ensp; </span><button type="submit" class="button1 button1_text">OK</button>
    </form>
    @if(session()->has('message'))
        <div class="color_green">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="clearfix cucanak">
        <div class="col col_5 col_md col_5_md col_sm col_4_sm">
            <img src="{{ asset('storage/uploads/image/qr/'. $food->qr_cod) }}" alt="image format png" />
        </div>
        <div class="col col_7 col_md col_7_md col_sm col_8_sm">
            <p>{{ $food->title }}</p>
        </div>
    </div>
    <hr>
    <div class="block_non">
        <p class="cord0">{{ $food->cord0 }}</p>
        <p class="cord1">{{ $food->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>

@endsection
