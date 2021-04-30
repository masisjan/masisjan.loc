@extends('layouts.main')
@section('content')
<div class="container container_md">
    <h1 class="p_h1 center padding_all_50">ՕԳՆԻՐ, ՈՐ ՕԳՆԵՆՔ</h1>
    <p class="p_h1">Ողջույն
        @if(auth()->check())
            {{ auth()->user()->name}} ջան
        @else
            հարգելիս
        @endif
        , դու գիտեիր որ կարող ես օգնել մեզ, որպեսզի մենք կարողանանք իրականացնել մեր նախագծերից որևէ մեկը․․․
    </p><br>
    <p class="p_h1">Դէ ինչ ծանոթացնենք մեզ օգնելու եղանակներին</p><br>
    <div class="clearfix center margin_15_0">
        <div class="col_md col col_6 col_6_md">
            <img src="{{asset('image/masisjan/ardshinBank.jpg')}}" class="width_350_0" alt="">
            <p class="p_post">Կարող եք փոխանցում կատարել Արդշին բանկի մեր << Խելացի Մասիս >> նորարարության հիմնադրամի 2475907781520000 հաշվեհամարի միջոցով, նշելով << Նորարարական Մասիս >> ծրագիրը։
Կամ փոխանցել տերմինալի օգնությամբ ՀՎՀՀ 04236714
            </p>
        </div>
        <div class="col_md col col_6 col_6_md">
            <img src="{{asset('image/masisjan/idram.jpg')}}" class="width_350_0" alt="">
            <p class="p_post"> Idram հավելվածով  սքանավորեք նշված QR կոդը և փոխանցեք այնքան գումար, որքան ցանկանաք։
Idram ID 604419313
            </p>
        </div>
    </div>
    <div class="center">
        <a href="{{ route('masisjan.contact') }}">
            <div class="float_left col_3 col_6_md divrandcolor bg_edit news_link">
                <h2 class="padding_all"><i class="fas fa-address-card"></i><br>ԿԱՊ ՄԵԶ ՀԵՏ</h2>
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
