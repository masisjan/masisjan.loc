@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

    <div class="bg_k2 center ">
        <p class="text_houm_tu ">Բոլորը</p>
    </div>
    <div class="bg_k1 clearfix">
        <div class="col col_6">
            <div class="width_350 icon_menu ">
                <a class="menu__item " href="{{ route('users.services.index', 3) }}"><i class="fas fa-plane"></i> ԱՎԻԱՏՈՄՍԵՐ</a>
                <a class="menu__item " href="{{ route('users.banks.index') }}"><i class="fas fa-landmark"></i> ԲԱՆԿԵՐ</a>
                <a class="menu__item " href="{{ route('users.services.index', 5) }}"><i class="fas fa-taxi"></i> ՏԱՔՍԻՆԵՐ</a>
                <a class="menu__item " href="{{ route('users.services.index', 9) }}"><i class="fas fa-flag"></i> ԿՈՒՍԱԿՑՈՒԹՅՈՒՆՆԵՐ</a>
                <a class="menu__item " href="{{ route('users.transports.index') }}"><i class="fas fa-bus"></i> ԵՐԹՈՒՂԱՅԻՆՆԵՐ</a>
            </div>
        </div>
        <div class="col col_6">
            <div class="width_350 icon_menu ">
                <a class="menu__item " href="{{ route('users.posts.index') }}"><i class="fas fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                <a class="menu__item " href="{{ route('users.categories.index') }}"><i class="fas fa-list" ></i> ԲԱԺԻՆՆԵՐ</a>
                <a class="menu__item " href="{{ route('users.services.index', 6) }}"><i class="fas fa-prescription-bottle-alt"></i> ԴԵՂԱՏՆԵՐ</a>
                <a class="menu__item " href="{{ route('users.services.index', 10) }}"><i class="fas fa-hamburger"></i> ԱՐԱԳ ՍՆՈՒՆԴ</a>
            </div>
        </div>
    </div>

@endsection
