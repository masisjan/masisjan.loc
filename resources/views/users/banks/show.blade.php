@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')
    <div class="col col_6 col_md col_6_md">
        <p class="p_post">Հրապարակված՝ {{ $bank->publish }}</p>
    </div>
    <div class="col col_6 col_md col_6_md">
        <p class="p_post">Հաստատված՝ {{ $bank->publish }}</p>
    </div><hr>
    <div>
        <h1 class="p_h1 ">{{ $bank->title }}</h1>
        <div class="p_date_count">
            <span>{{ $bank->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $bank->count }} դիտում</span>
        </div>
        @if($bank->image)
            <img src="{{ asset('storage/uploads/image/banks/'. $bank->image) }}" class="input-container" alt="">
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
                <i class="fas fa-user-circle"></i><span><strong>Ղեկավար՝</strong> {{ $bank->director }}</span><br>
                <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> {{ $bank->address }}</span><br>
                <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:{{ $bank->phone }}"> {{ $bank->phone }}</a></span><br>
                <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> {{ $bank->email }}</span><br>
                <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="{{ $bank->site }}"> {{ $bank->site }}</a></span><br>
                <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="{{ $bank->fb }}"> {{ $bank->fb }}</a></span><br>
            </div>
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Աշխատանքային օրեր, ժամեր</p>
                <i class="fas circle">1</i><span><strong>Երկուշաբթի՝</strong> {{ $bank->monday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">2</i><span><strong>Երեքշաբթի՝</strong> {{ $bank->tuesday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">3</i><span><strong>Չորեքշաբթի՝</strong> {{ $bank->wednesday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">4</i><span><strong>Հինգշաբթի՝</strong> {{ $bank->thursday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">5</i><span><strong>Ուրբաթ՝</strong> {{ $bank->friday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">6</i><span><strong>Շաբաթ՝</strong> {{ $bank->saturday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">7</i><span><strong>Կիրակի՝</strong> {{ $bank->sunday ?? 'Փակ է' }}</span><br>
            </div>
        </div>
        <div id="map" style="height: 400px" class="margin_15_0"></div>
        <p class="p_post">{{ $bank->text }}</p>
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
    <div class="col-md-9 offset-md-3 margin_15_0 padding_b_5">
        <a href="{{ route('users.banks.edit', $bank->id) }}" class="btn btn-info button1 button1_text bg_edit">Խմբագրել</a>
        <a href="{{ route('users.banks.destroy', $bank->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Հեռացնել</a>
        <a href=" {{ route('users.banks.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
    </div>
    <div class="block_non">
        <p class="cord0">{{ $bank->cord0 }}</p>
        <p class="cord1">{{ $bank->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>
@endsection
