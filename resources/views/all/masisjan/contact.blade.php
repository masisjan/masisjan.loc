@extends('layouts.main')
@section('content')
<div class="container container_md">
    <h1 class="p_h1 center padding_all_50">ԿԱՊ ՄԵԶ ՀԵՏ</h1>
    <div class="col col_6 col_md col_6_md icon_footer"><br>
        <i class="fas fa-user-circle"></i><span><strong>Հիմնադիր՝</strong> Աշոտ Բաղդասարյան</span><br>
        <i class="fas fa-map-marker-alt"></i><span><strong>Հասցե՝</strong> Քաղաք Մասիս</span><br>
        <i class="fas fa-phone-alt"></i><span><strong>Հեռ՝</strong><a href="tel:033131317"> 033-13-13-17</a></span><br>
        <i class="fas fa-envelope"></i><span><strong>Էլ․ փոստ՝</strong> </span><br>
        <i class="fab fa-internet-explorer"></i><span><strong>Կայք՝</strong><a href="/"> masisjan.net</a></span><br>
        <i class="fab fa-facebook-f"></i><span><strong>ֆեյսբուք՝</strong><a href="https://www.facebook.com/masisjan.net"> facebook.com/masisjan</a></span><br>
    </div>
    <div class="col col_6 col_md col_6_md icon_footer">
        <div id="map" style="height: 350px" class="margin_15_0"></div>
        <div class="block_non">
            <p class="cord0">40.0621</p>
            <p class="cord1">44.4431</p>
        </div>
        <script src=" {{ asset('js/map.js') }} "></script>
    </div>
    <div class="center">
        <a href="{{ route('masisjan.help') }}">
            <div class="float_left col_3 col_6_md divrandcolor bg_edit news_link">
                <h2 class="padding_all"><i class="fas fa-piggy-bank"></i><br>ԿԱՏԱՐԵԼ ՆՎԻՐԱՏՎՈՒԹՅՈՒՆ</h2>
            </div>
        </a>
        <a href="{{ route('masisjan') }}">
            <div class="float_left col_3 col_6_md divrandcolor bg_save news_link">
                <h2 class="padding_all"><i class="fas fa-history"></i><br>ՄԵՐ ՊԱՏՄՈՒԹՅՈՒՆԸ</h2>
            </div>
        </a>
        <a href="">
            <div class="float_left col_3 col_6_md divrandcolor bg_delete news_link">
                <h2 class="padding_all"><i class="fas fa-handshake"></i><br>ԴԱՌՆԱԼ ԳՈՐԾՆԿԵՐ</h2>
            </div>
        </a>
        <a href="">
            <div class="float_left col_3 col_6_md divrandcolor bg_n news_link">
                <h2 class="padding_all"><i class="fas fa-ad"></i><br>ՏԵՂԱԴՐԵԼ ԳՈՎԱԶԴ</h2>
            </div>
        </a>
    </div>
</div>
@endsection
