@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md">
            @if($banks->count())
                @foreach($banks as $bank)
                <div class="b_border margin_15_0 clearfix news_h_sm">
                    <div class="col col_4 col_md col_4_md">
                        <a href="{{ route('banks.show', $bank->id) }}">
                        @if($bank->image)
                            <img src="{{ asset('storage/uploads/image/banks/'. $bank->image) }}" class="input-container news_link p_b_img" alt="">
                        @else
                            <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container news_link p_b_img" alt="">
                        @endif
                        </a>
                    </div>
                    <div class="col col_8 col_md col_8_md">
                        <a href="{{ route('banks.show', $bank->id) }}" class="news_link "><h3 class="padding_lr_15">{{ $bank->title }}</h3></a>
                        <div class="p_date_count">
                            <i class="fa fa-eye margin_left_3"></i><span> {{ $bank->count }} դիտում</span>&nbsp;
                            <i class="fas fa-star"></i><span> {{ $bank->rating }} վարկանիշ</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        {{ $banks->appends (['sort' => 'voices'])->links() }}
            <br>
        </div>
        <div class="col col_3 col_md col_3_md">
            @include('api._baner_right')
        </div>
    </div>

@endsection
