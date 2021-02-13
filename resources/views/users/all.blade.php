@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

    <div class="bg_k2 center ">
        <p class="text_houm_tu ">All</p>
    </div>
    <div class="bg_k1 clearfix">
        <div class="col col_6">
            <div class="width_350 icon_menu ">
                <a class="menu__item " href="{{ route('users.flights.index') }}"><i class="fas fa-plane"></i> ԱՎԻԱՏՈՄՍԵՐ</a>
                <a class="menu__item " href="{{ route('users.banks.index') }}"><i class="fas fa-landmark"></i> ԲԱՆԿԵՐ</a>
                <a class="menu__item " href="{{ route('users.taxis.index') }}"><i class="fas fa-taxi"></i> ՏԱՔՍԻՆԵՐ</a>
            </div>
        </div>
        <div class="col col_6">
            <div class="width_350 icon_menu ">
                <a class="menu__item " href="{{ route('users.posts.index') }}"><i class="fas fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                <a class="menu__item " href="{{ route('users.categories.index') }}"><i class="fas fa-list" ></i> ԲԱԺԻՆՆԵՐ</a>
            </div>
        </div>
    </div>

@endsection
