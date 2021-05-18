@extends('layouts.main')
@section('content')

    <div class="houm vh relative">
        <div class="container container_md">
            <img class="houm_img" src="image/app/214121.png" alt="">
            @if($words->count())
                @foreach($words as $index => $word)
                    <div id="word{{  $index + 1 }}" @if($index + 1 > 1) class="block_non" @endif >
                        <p class="text_houm_tu center_sm padding-top">{{ $word->title_1 }}</p>
                        <p class="text_houm_uan center_sm text_upp">{{ $word->title_2 }}</p>
                        <p class="text_houm_tu center_sm">{{ $word->title_3 }}</p>
                    </div>
                @endforeach
            @endif
            <div class="center_sm">
            <p id="word_click" class="button1 button1_text center_sm display_i_b">apload</p>
            </div>
            <div class="center relative">
                <div id="guest" class="center_b center icon_menu block_non">
                    <a class="guest_icon" href="#"><i class="far fa-arrow-alt-circle-left" ></i>ԲՆԱԿԻՉ</a>
                    <a class="guest_icon" href="#">ՀՅՈՒՐ <i class="far fa-arrow-alt-circle-right" ></i></a>
                </div>
            </div>
            <div class="center">
                <a href="#news" ><img src="{{asset('image/app/button_nerqev.png')}}" class="button_nerqev more" alt=""></a>
            </div>
        </div>
    </div>
    <script src=" {{ asset('js/word.js') }} "></script>
    @if($posts->count())
        <div class="container container_md container_sm news_h clearfix" id="news">
            @foreach($posts as $post)
                <a href="{{ route('news.show', $post->id) }}">
                <div class="col col_4 col_md col_6_md">
                    @if($post->image)
                        <img src="{{ asset('storage/uploads/image/posts/'. $post->image) }}" class="input-container p_b_img" alt="">
                    @else
                        <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container p_b_img" alt="">
                    @endif
                    <h3 class="padding_lr_15"> {{ $post->title }} </h3>
                </div>
                </a>
            @endforeach
        </div><br><br>
    @endif
    @if($allies->count())
        <div class="container container_md container_sm center">
            <p class="p_h1">ՄԵՐ ԳՈՐԾԸՆԿԵՐՆԵՐԸ</p>
            @foreach($allies as $ally)
                <a href="{{ $ally->href }}" title="{{ $ally->title }}">
                    <img src="{{ asset('storage/uploads/image/user/ally/'. $ally->image) }}" class="img_gort" alt="">
                </a>
            @endforeach
        </div><br><br>
    @endif
    <div class="container container_md container_sm center padding_30_0 otziv">
        <p class="p_h1">ԿԱՐԾԻՔ ԲՆԱԻՉՆԵՐԻՑ</p>
        <p class="p_post">Ահա մեր բնակիչների կողմից ներկայացված մեր մասին բազմաթիվ բնութագրերից մի քանիսը։</p>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fkaren.galstyan.35912%2Fposts%2F1569510599881053&show_text=true&width=300" width="300" height="186" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture"></iframe>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fhayk.taroyan.5%2Fposts%2F2116198508467677&show_text=true&width=300" width="300" height="186" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture"></iframe>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmash.hayrapetyan.5%2Fposts%2F3773466059410446&show_text=true&width=300" width="300" height="186" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture"></iframe>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fnorik.petrosan%2Fposts%2F2641600249232645&show_text=true&width=300" width="300" height="186" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture"></iframe>
    </div>
@endsection
