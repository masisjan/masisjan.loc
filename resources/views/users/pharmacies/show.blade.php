@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div>
        <h1 class="p_h1 ">{{ $pharmacy->title }}</h1>
        <div class="p_date_count">
            <span>{{ $pharmacy->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $pharmacy->count }} դիտում</span>
        </div>
        @if($pharmacy->image)
            <img src="{{ asset('storage/uploads/image/pharmacies/'. $pharmacy->image) }}" class="input-container" alt="">
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
                <i class="fas fa-user-circle"></i><span><strong>Ղեկավար՝</strong> {{ $pharmacy->director }}</span><br>
                <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> {{ $pharmacy->address }}</span><br>
                <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:{{ $pharmacy->phone }}"> {{ $pharmacy->phone }}</a></span><br>
                <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> {{ $pharmacy->email }}</span><br>
                <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="{{ $pharmacy->site }}"> {{ $pharmacy->site }}</a></span><br>
                <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="{{ $pharmacy->fb }}"> {{ $pharmacy->fb }}</a></span><br>
            </div>
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Աշխատանքային օրեր, ժամեր</p>
                <i class="fas circle">1</i><span><strong>Երկուշաբթի՝</strong> {{ $pharmacy->monday }}</span><br>
                <i class="fas circle">2</i><span><strong>Երեքշաբթի՝</strong> {{ $pharmacy->tuesday }}</span><br>
                <i class="fas circle">3</i><span><strong>Չորեքշաբթի՝</strong> {{ $pharmacy->wednesday }}</span><br>
                <i class="fas circle">4</i><span><strong>Հինգշաբթի՝</strong> {{ $pharmacy->thursday }}</span><br>
                <i class="fas circle">5</i><span><strong>Ուրբաթ՝</strong> {{ $pharmacy->friday }}</span><br>
                <i class="fas circle">6</i><span><strong>Շաբաթ՝</strong> {{ $pharmacy->saturday }}</span><br>
                <i class="fas circle">7</i><span><strong>Կիրակի՝</strong> {{ $pharmacy->sunday }}</span><br>
            </div>
        </div>
        <div id="map" style="height: 400px" class="margin_15_0"></div>
        <p class="p_post">{{ $pharmacy->text }}</p>
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
        <a href="{{ route('users.pharmacies.edit', $pharmacy->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.pharmacies.destroy', $pharmacy->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.pharmacies.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>
    <hr>
    @include('api._cucanak')
    <form action="{{ route('tablichka.email') }}" method="post">
        @csrf
        <input type="hidden" value="{{ asset('storage/uploads/image/qr/'. $pharmacy->qr_cod) }}" name="image_qr">
        <input type="hidden" value="{{ $pharmacy->title }}" name="title">
        <span>Պատվիրել ցուցանակը Գիլոյան ընկերությունում ? &ensp; </span><button type="submit" class="button1 button1_text">OK</button>
    </form>
    @if(session()->has('message'))
        <div class="color_green">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="clearfix cucanak">
        <div class="col col_5 col_md col_5_md col_sm col_4_sm">
            <img src="{{ asset('storage/uploads/image/qr/'. $pharmacy->qr_cod) }}" alt="image format png" />
        </div>
        <div class="col col_7 col_md col_7_md col_sm col_8_sm">
            <p>{{ $pharmacy->title }}</p>
        </div>
    </div>
    <hr>
    <div class="block_non">
        <p class="cord0">{{ $pharmacy->cord0 }}</p>
        <p class="cord1">{{ $pharmacy->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>

@endsection
