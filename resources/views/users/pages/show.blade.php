@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')
    <div class="col col_6 col_md col_6_md">
        @if($page->publish == "yes")
        <p class="p_post bg_save">Հրապարակված՝ {{ $page->publish }}</p>
        @else
        <p class="p_post bg_delete">Հրապարակված՝ {{ $page->publish }}</p>
        @endif
    </div>
    <div class="col col_6 col_md col_6_md">
        <p class="p_post bg_edit">ID. Համար՝ {{ $page->id }}</p>
    </div>
    <p class="p_date_count">Հղումը՝ <a href="{{ asset('pages/'. $page->id) }}"> {{ asset('pages/'. $page->id) }}</a></p>
    <hr>
    <div>
        <h1 class="p_h1 ">{{ $page->title }}</h1>
        <div class="p_date_count">
            <span>{{ $page->created_at }} </span>
            <i class="fa fa-eye margin_left_3"></i><span> {{ $page->count }} դիտում</span>
        </div>
        @if($page->image)
            <img src="{{ asset('storage/uploads/image/pages/'. $page->image) }}" class="input-container" alt="">
        @else
            <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container" alt="">
        @endif
        <div class="icon_footer">
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-telegram-plane"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
        </div><hr>
        <div class="clearfix">
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Կոնտակտային տվյալներ</p>
                <i class="fas fa-user-circle"></i><span><strong>Ղեկավար՝</strong> {{ $page->director }}</span><br>
                <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> {{ $page->address }}</span><br>
                <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:{{ $page->phone }}"> {{ $page->phone }}</a></span><br>
                <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> {{ $page->email }}</span><br>
                <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="{{ $page->site }}"> {{ $site_url }}</a></span><br>
                <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="{{ $page->fb }}"> {{ $fb_url }}</a></span><br>
            </div>
            <div class="col col_6 col_md col_6_md icon_footer"><br>
                <p class="p_post">Աշխատանքային օրեր, ժամեր</p>
                <i class="fas circle">1</i><span><strong>Երկուշաբթի՝</strong> {{ $page->monday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">2</i><span><strong>Երեքշաբթի՝</strong> {{ $page->tuesday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">3</i><span><strong>Չորեքշաբթի՝</strong> {{ $page->wednesday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">4</i><span><strong>Հինգշաբթի՝</strong> {{ $page->thursday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">5</i><span><strong>Ուրբաթ՝</strong> {{ $page->friday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">6</i><span><strong>Շաբաթ՝</strong> {{ $page->saturday ?? 'Փակ է' }}</span><br>
                <i class="fas circle">7</i><span><strong>Կիրակի՝</strong> {{ $page->sunday ?? 'Փակ է' }}</span><br>
            </div>
        </div>
        <div id="map" style="height: 400px" class="margin_15_0"></div>
        <p class="p_post">{{ $page->text }}</p>
        <div class="clearfix">
            <div class="icon_footer">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.pages.edit', $page->id) }}" class="btn btn-info button1 button1_text bg_edit">Խմբագրել</a>
        <a href="{{ route('users.pages.destroy', $page->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Հեռացնել</a>
        <a href=" {{ route('users.pages.index', $tab) }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
    </div>
    <form id="form-delete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    @if($page->qr_cod != null)
        <hr>
        <p class="p_post">Masisjan կայքի խելացի ալգորիթմը ձեզ համար պատրաստել է ցուցանակ, որը փակցնելով կառույցի վրա թույլ կտա բնակիչներին Qr կոդի միջոցով հեշտությամբ ստանալ տեղեկատվություն։</p>
        <form action="{{ route('tablichka.email') }}" method="post">
            @csrf
            <input type="hidden" value="{{ asset('storage/uploads/image/qr/'. $page->qr_cod) }}" name="image_qr">
            <input type="hidden" value="{{ $page->title }}" name="title">
            <span>Պատվիրել ցուցանակը Գիլոյան ընկերությունում ? &ensp; </span><button type="submit" class="button1 button1_text">OK</button>
        </form>
        @if(session()->has('message'))
            <div class="color_green">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="clearfix cucanak">
            <div class="col col_5 col_md col_5_md col_sm col_4_sm">
                <img src="{{ asset('storage/uploads/image/qr/'. $page->qr_cod) }}" alt="image format png" />
            </div>
            <div class="col col_7 col_md col_7_md col_sm col_8_sm">
                <p>{{ $page->title }}</p>
            </div>
        </div>
        <hr>
    @endif
    <div class="block_non">
        <p class="cord0">{{ $page->cord0 }}</p>
        <p class="cord1">{{ $page->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>
@endsection
