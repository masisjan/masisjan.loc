@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md b_border b_border_sm">
            <h1 class="p_h1 ">{{ $event->title }}</h1>
            <div class="p_date_count">
                <span>{{ $event->created_at }} </span>
                <i class="fa fa-eye margin_left_3"></i><span> {{ $event->count }} դիտում</span>
            </div>
            <img src="{{ $og_image }}" class="input-container" alt="">
            <div class="icon_footer">
                @include('api._soc_share')
            </div>
            <div class="icon_footer"><hr>
                <p><i class="fas fa-flag"></i><strong> Միջոցառման կազմակերպիչ՝</strong> {{ $event->organizer }}</p>
                <p><i class="fas fa-clock"></i><strong> Ժամանակը՝</strong> սկիզբ․ {{ $event->date_start ?? '?' }} ավարտ․ {{ $event->date_end ?? '?' }}</p>
                <p><i class="fas fa-money-bill-wave"></i><strong> Արժեքը՝</strong> {{ $event->value }}</p>
            </div>
            <p class="p_event">{{ $event->text }}</p>
            <div id="map" style="height: 400px" class="margin_15_0"></div>
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer">
                    @include('api._soc_share')
                </div>
                <div class="col col_6 col_md col_6_md  p_date_count"><br>
                    <i class="fas fa-user-circle"></i><a href=""> {{ $event->user->name }}</a><br>
                </div>
            </div>
        </div>
        <div class="col col_3 col_md col_3_md relative">
            @include('api._baner_right')
        </div>
    </div>
    <div class="block_non">
        <p class="cord0">{{ $event->cord0 }}</p>
        <p class="cord1">{{ $event->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>
    @include('api._button_all')

@endsection
