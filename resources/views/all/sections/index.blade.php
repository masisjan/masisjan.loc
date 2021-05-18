@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md">
            @if($sections->count())
                @foreach($sections as $section)
                <div class="b_border margin_15_0 clearfix news_h_sm">
                    <div class="col col_4 col_md col_4_md">
                        <a href="{{ route('sections.show', $section->id) }}">
                        @if($section->image)
                            <img src="{{ asset('storage/uploads/image/sections/'. $section->image) }}" class="input-container news_link p_b_img" alt="">
                        @else
                            <img src="{{ asset('image/app/default-section.jpg') }}" class="input-container news_link p_b_img" alt="">
                        @endif
                        </a>
                    </div>
                    <div class="col col_8 col_md col_8_md">
                        <a href="{{ route('sections.show', $section->id) }}" class="news_link "><h3 class="padding_lr_15">{{ $section->title }}</h3></a>
                        <p class="margin_15_0 block_non_md block_non_sm padding_lr_15">{{ $section->short_text }}</p>
                        <div class="p_date_count">
                            <span>{{ $section->created_at }} </span>
                            <i class="fa fa-eye margin_left_3"></i><span> {{ $section->count }} դիտում</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        {{ $sections->appends (['sort' => 'voices'])->onEachSide(0)->links() }}
            <br>
        </div>
        <div class="col col_3 col_md col_3_md">
            @include('api._baner_right')
        </div>
    </div>

@endsection
