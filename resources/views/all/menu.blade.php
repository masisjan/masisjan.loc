@extends('layouts.main')
@section('content')
    <div class="padding_head footer_fon_2 clearfix">
        <div class="container container_md">
            <div class="search">
                <form>
                    <input type="text" placeholder="Փնտրել...">
                    <button type="submit" class="block_non"></button>
                </form>
            </div><br>
            <div class="center div_b_m clearfix menusBottom">
                <div class="col col_md col_3 col_6_md" id="allBottom"><p class="bg_n">Թոփ բաժինները</p></div>
                <div class="col col_md col_3 col_6_md" id="myBottom"><p class="bg_k2">Իմ թոփ բաժինները</p></div>
                <div class="col col_md col_3 col_6_md" id="hotBottom"><p class="bg_k2">Կարևօր բաժինները</p></div>
                <div class="col col_md col_3 col_6_md" id="abcBottom"><p class="bg_k2">Ըստ այբենարանի</p></div>
            </div>
            <div class="icon_menu menus padding_b_50">
                <div class="menu" id="allBottoma">
                    @foreach($allMenus as $allMenu)
                    <div class="col col_md col_4 col_6_md">
                        <a class="menu__item" href="{{ asset($allMenu->href) }}"><i class="{{ $allMenu->icon }}" ></i> {{ $allMenu->title }}</a>
                    </div>
                    @endforeach
                </div>
                <div class="menu" id="myBottoma">
                    @if (Auth::check())
                    @foreach($myMenus as $myMenu)
                        @if($myMenu->menu->table_id > 0)
                        <div class="col col_md col_4 col_6_md">
                            <a class="menu__item" href="{{ asset($myMenu->menu->href) }}"><i class="{{ $myMenu->menu->icon }}" ></i> {{ $myMenu->menu->title }}</a>
                        </div>
                        @endif
                    @endforeach
                    @else
                        <a class="menu__item" href="{{ asset('login') }}"><i class="fas fa-user-circle"></i> ԴԵՌ ԳՐԱՆՑՎԱԾ ՉԵՔ ?</a>
                    @endif
                </div>
                <div class="menu" id="hotBottoma">
                    @foreach($hotMenus as $hotMenu)
                        <div class="col col_md col_4 col_6_md">
                            <a class="menu__item" href="{{ asset($hotMenu->href) }}"><i class="{{ $hotMenu->icon }}" ></i> {{ $hotMenu->title }}</a>
                        </div>
                    @endforeach
                </div>
                <div class="menu" id="abcBottoma">
                    @foreach($abcMenus as $abcMenu)
                        <div class="col col_md col_4 col_6_md">
                            <a class="menu__item accordion" href="{{ asset($abcMenu->href) }}"><i class="{{ $abcMenu->icon }}" ></i> {{ $abcMenu->title }}</a>
                            <div class="padding_lr_15 margin_left_3 panel content block_non bgc_nitral">
                                @if(count($abcMenu->subcategory))
                                    @include('all.child_menu',['subcategories' => $abcMenu->subcategory])
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
