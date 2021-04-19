@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

<div class="bg_k2 center ">
    <p class="text_houm_tu ">Բոլորը</p>
</div>
<div class="icon_menu menus padding_b_50 footer_fon_2 clearfix">
    <div class="menu" id="abcBottoma">
        @foreach($abcMenus as $abcMenu)
            <div class="col col_md col_6 col_6_md">
                @if($abcMenu->href =='#!')
                <a class="menu__item accordion" href="#!">
                @else
                <a class="menu__item accordion" href="{{ asset('/users/' . $abcMenu->href) }}">
                @endif
                    <i class="{{ $abcMenu->icon }}" ></i> {{ $abcMenu->title }}
                </a>
                <div class="padding_lr_15 margin_left_3 panel content block_non bgc_nitral">
                    @if(count($abcMenu->subcategory))
                        @include('users.child_menu',['subcategories' => $abcMenu->subcategory])
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="bg_k2 center padding_all">
    <p class="color_white">Չկա Ձեզ անհրաժեշտ բաժինը ?, գրեք մեզ։</p>
</div>
@endsection
