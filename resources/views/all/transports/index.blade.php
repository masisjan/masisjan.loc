@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md">
            @if($transports->count())
                @foreach($transports as $transport)
                <div class="b_border margin_15_0 clearfix news_h_sm">
                    <div class="col col_4 col_md col_4_md">
                        <a href="{{ route('transports.show', $transport->id) }}">
                            <img src="{{ $og_image }}" class="input-container news_link p_b_img" alt="">
                        </a>
                    </div>
                    <div class="col col_8 col_md col_8_md">
                        <a href="{{ route('transports.show', $transport->id) }}" class="news_link ">
                            <h2 class="padding_lr_15">{{ $transport->title1 }} - {{ $transport->title2 }} N{{ $transport->number }}</h2>
                        </a>
                        <div class="p_date_count">
                            <i class="fa fa-eye margin_left_3"></i><span> {{ $transport->count ?? 0 }} դիտում</span>&nbsp;
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        {{ $transports->appends (['sort' => 'voices'])->onEachSide(0)->links() }}
            <br>
        </div>
        <div class="col col_3 col_md col_3_md">
            @include('api._baner_right')
        </div>
    </div>

@endsection
