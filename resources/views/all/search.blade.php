@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md">
            @if($orders->count())
                @foreach($orders as $order)
                <div class="search_height bg_nitral padding_all">
                    <a href="{{ route($order->someFunction() . '.show', $order->id) }}" class="news_link"><h3 class="color_kapuyt padding_lr_15">{{ $order->title }}</h3></a>
                    <p class="margin_15_0 padding_lr_15">{{ $order->text }}․․․</p>
                </div><br>
                @endforeach
            @else
                <div class="center search margin_15_0">
                    <p class="color_bord">Ձեր հարցմանը համապատասխան տվյալներ չկան, խնդրում ենք այլ կերպ փորձել</p>
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="search" placeholder="Փնտրել...">
                        <button type="submit"></button>
                    </form>
                </div>
            @endif
{{--        {{ $orders->appends (['sort' => 'voices'])->onEachSide(0)->links() }}--}}
            <br>
        </div>
        <div class="col col_3 col_md col_3_md">
            @include('api._baner_right')
        </div>
    </div>

@endsection
