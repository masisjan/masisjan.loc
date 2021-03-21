@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md b_border b_border_sm">
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
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer bg_nitral b_r margin_15_0">
                    @include('api._soc_share')
                </div>
                <div class="col col_6 col_md col_6_md bg_nitral b_r">
                    @include('api._rating')
                </div>
            </div>
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer"><br>
                    <p class="p_post">Կոնտակտային տվյալներ</p>
                    <i class="fas fa-user-circle"></i><span><strong>Ղեկավար՝</strong> {{ $food->director }}</span><br>
                    <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> {{ $food->address }}</span><br>
                    <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:{{ $food->phone }}"> {{ $food->phone }}</a></span><br>
                    <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> {{ $food->email }}</span><br>
                    <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="{{ $food->site }}"> {{ $site_url }}</a></span><br>
                    <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="{{ $food->fb }}"> facebook.com/id</a></span><br>
                </div>
                <div class="col col_6 col_md col_6_md icon_footer dey"><br>
                    <div class="p_post">Աշխատանքային օրեր, ժամեր</div>
                    <div id="Monday"><i class="fas circle">1</i><span><strong>Երկուշաբթի՝</strong> {{ $food->monday }}</span></div>
                    <div id="Tuesday"><i class="fas circle">2</i><span><strong>Երեքշաբթի՝</strong> {{ $food->tuesday }}</span></div>
                    <div id="Wednesday"><i class="fas circle">3</i><span><strong>Չորեքշաբթի՝</strong> {{ $food->wednesday }}</span></div>
                    <div id="Thursday"><i class="fas circle">4</i><span><strong>Հինգշաբթի՝</strong> {{ $food->thursday }}</span></div>
                    <div id="Friday"><i class="fas circle">5</i><span><strong>Ուրբաթ՝</strong> {{ $food->friday }}</span></div>
                    <div id="Saturday"><i class="fas circle">6</i><span><strong>Շաբաթ՝</strong> {{ $food->saturday }}</span></div>
                    <div id="Sunday"><i class="fas circle">7</i><span><strong>Կիրակի՝</strong> {{ $food->sunday }}</span></div>
                </div>
            </div>
            <div id="map" style="height: 400px" class="margin_15_0"></div>
            <p class="p_post">{{ $food->text }}</p>
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer bg_nitral b_r margin_15_0">
                    @include('api._soc_share')
                </div>
                <div class="col col_6 col_md col_6_md margin_15_0"><br>
                    <a href="{{ route('foods') }}" class="button1 button1_text">Բոլոր վայրերը</a>
                </div>
            </div>
        </div>
        <div class="col col_3 col_md col_3_md relative">
            @include('api._baner_right')
        </div>
    </div>
    <div class="block_non">
        <p class="cord0">{{ $food->cord0 }}</p>
        <p class="cord1">{{ $food->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>
    @include('api._button_all')

@endsection
