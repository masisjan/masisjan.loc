@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix b_border b_border_sm">
        <div class="col col_9 col_md col_9_md">
            <h1 class="p_h1 ">{{ $section->title }}</h1>
            <div class="p_date_count">
                <span>{{ $section->created_at }} </span>
                <i class="fa fa-eye margin_left_3"></i><span> {{ $section->count }} դիտում</span>
            </div>
            <img src="{{ $og_image }}" class="input-container" alt="">
            <div class="icon_footer">
                @include('api._soc_share')
            </div>
            <p class="p_post">{{ $section->text }}</p>
            @if($section->images)
                <div class="clearfix margin_15_0">
                    @foreach ($images as $image)
                        <div class="col col_6 col_md col_6_md click-zoom relative">
                            <label>
                                <input type="checkbox">
                                <img src="{{ asset('storage/uploads/image/sections/' . $image) }}" class="img_map border" alt="">
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif
            <div id="map" style="height: 400px" class="margin_15_0"></div>
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer">
                    @include('api._soc_share')
                </div>
                <div class="col col_6 col_md col_6_md  p_date_count"><br>
                    <a href="{{ route('sections', $section->tab_name) }}" class="button1 button1_text">Բոլորը</a>
                </div>
            </div>
        </div>
        <div class="col col_3 col_md col_3_md">
            @include('api._baner_right')
        </div>
    </div>
    <div class="block_non">
        <p class="cord0">{{ $section->cord0 }}</p>
        <p class="cord1">{{ $section->cord1 }}</p>
    </div>
    <script src=" {{ asset('js/map.js') }} "></script>
    @include('api._button_all')

@endsection
