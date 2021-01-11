@extends('layouts.admin')
@section('title', 'Contact App | All contacts')
@section('content')

    <div class="bg_k2 center ">
        <p class="text_houm_tu ">All</p>
    </div>
    <div class="bg_k1 clearfix">
        <div class="col col_6">
            <div class="width_350 icon_menu ">
                <a class="menu__item " href="#"><i class="fas fa-briefcase" ></i> ԱՇԽԱՏԱՆՔ</a>
            </div>
        </div>
        <div class="col col_6">
            <div class="width_350 icon_menu ">
                <a class="menu__item " href="{{ route('admins.posts.index') }}"><i class="fas fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                <a class="menu__item " href="{{ route('admins.categories.index') }}"><i class="fas fa-list" ></i> ԲԱԺԻՆՆԵՐ</a>
            </div>
        </div>
    </div>

@endsection
