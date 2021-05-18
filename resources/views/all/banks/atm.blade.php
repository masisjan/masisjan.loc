@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md b_border b_border_sm">
            <h1 class="p_h1 ">Բանկոմատներ</h1>
            <img src="{{asset('image/app/atm.jpg')}}" class="input-container" alt="">
            <div class="icon_footer">
                @include('api._soc_share')
            </div>
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae2e8f6ed30243c467e6c88b80263527d19ba073e20780569778aed24cdba42dd&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            <div class="icon_footer">
                @include('api._soc_share')
            </div>
        </div>
        <div class="col col_3 col_md col_3_md relative">
            @include('api._baner_right')
        </div>
    </div>
    @include('api._button_all')

@endsection
