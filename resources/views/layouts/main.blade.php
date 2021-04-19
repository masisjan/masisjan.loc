<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $og_title ?? 'Մասիս քաղաքի տեղեկատվական և լրատվական կայք' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
{{--    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
{{--    <link href=" {{ asset('css/bootstrap.min.css') }} " rel="stylesheet">--}}
    <link href=" {{ asset('css/custom.css') }} " rel="stylesheet">
{{--        FACEBOOK--}}
    <meta property="og:title" content="{{ $og_title ?? 'Մասիս քաղաքի տեղեկատվական և լրատվական կայք' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{ $og_description ?? 'Մասիսջանը Մասիս քաղաքի տեղեկատվական և լրատվական կայք է, որը գործում է սկսած 2018 թվականից' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
{{--    {{ dd(url('')) }}--}}
    @if(isset($og_image))
    <meta property="og:image" content="{{ $og_image }}"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="{{ $og_image }}" />
    @endif
{{--        TWITTER--}}
    <meta name="twitter:title" content="{{ $og_title ?? 'Մասիս քաղաքի տեղեկատվական և լրատվական կայք' }}" />
    <meta name="twitter:description" content="{{ $og_description ?? 'Մասիսջանը Մասիս քաղաքի տեղեկատվական և լրատվական կայք է, որը գործում է սկսած 2018 թվականից' }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href=" {{ asset('css/style_xl.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/style_md.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/style_sm.css') }} " rel="stylesheet">
</head>
<body>
{{--                          navbar                --}}
    <div class="raz navbar clearfix">
        <div class="container_sm container_md">
            <div>
                <a href="/"><img src="{{asset('image/app/logo_mj.png')}}" class="logo_mj mg_l_100" alt=""></a>
                <i class="fas fa-ellipsis-h icon_more center_i"></i>
            </div>
            <div class="center">
                <span class="buje">{{ $money->money_count ?? 0}} դ</span>
            </div>
            <a href=" {{ asset('/login') }} "><i class="fas fa-user-circle icon_user center_it" ></i></a>
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                    <span></span>
                </label>

                <div class="menu__box">
                    <div class="container container_md">
                    <div class="search">
                        <form>
                            <input type="text" placeholder="Փնտրել...">
                            <button type="submit" class="block_non"></button>
                        </form>
                    </div><br>
                    <div class="col col_6 icon_menu">
                        <div class="center div_b_m clearfix">
                            <div class="col col_md col_4 col_4_md"><p class="bg_n" id="alltop_click">Թոփ բաժինները</p></div>
                            <div class="col col_md col_4 col_4_md"><p class="bg_k2 " id="mytop_click">Իմ թոփ բաժինները</p></div>
                            <div class="col col_md col_4 col_4_md"><p class="bg_k2 " id="">Կարևօր բաժինները</p></div>
                        </div>
                        <div class="width_350 alltop" id="alltop">
                            @foreach($menus as $menu)
                                <a class="menu__item" id="{{'all_img' . $menu->id }}"  href="{{ asset($menu->href) }}"><i class="{{ $menu->icon }}" ></i> {{ $menu->title }}</a>
                            @endforeach
                        </div>
                        <div class="block_non width_350_0 mytop" id="mytop">
                            @if (Auth::check())
                            @foreach($my_counts as $my_count)
                                <a class="menu__item" id="{{'my_img' . $my_count->menu->id }}"  href="{{ asset($my_count->menu->href) }}"><i class="{{ $my_count->menu->icon }}" ></i> {{ $my_count->menu->title }}</a>
                            @endforeach
                            @else
                                <a class="menu__item" href="{{ asset('login') }}"><i class="fas fa-user-circle"></i> ԴԵՌ ԳՐԱՆՑՎԱԾ ՉԵՔ ?</a>
                            @endif
                        </div>
                        <div class="width_350_0">
                            <a class="menu__item" href="{{ asset('menu') }}"><i class="fas fa-circle" ></i> ԲՈԼՈՐԸ</a>
                        </div>
                    </div>
                    <div class="col col_6 menu_img block_non_sm block_non_md">
                        <div class="alltopimg" id="alltop_img">
                            @foreach($menus as $menu)
                                <img class="block_non_xl" id="{{'all_img' . $menu->id . 'a' }}" src="{{asset('storage/uploads/image/user/menu/' . $menu->image)}}" alt="" >
                            @endforeach
                        </div>
                        <div class="block_non_xl mytopimg" id="mytop_img">
                            @if (Auth::check())
                                @foreach($my_counts as $my_count)
                                    <img class="block_non_xl" id="{{'my_img' . $my_count->menu->id . 'a' }}" src="{{asset('storage/uploads/image/user/menu/' . $my_count->menu->image)}}" alt="" >
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
{{--                          menu                --}}
<div class="wrapper">
    <div class="contents">
        @yield('content')
    </div>
{{--                          FOOTER                --}}
<footer>
    <div class="clearfix footer_fon_13">
        <div class="container container_md ">
            <div class="col col_md col_6 col_6_md icon_footer center_sm">
                <a href="https://www.facebook.com/masisjan.net"><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col col_md col_6 col_6_md search">
                <form class="right_xl">
                    <input type="text" placeholder="Փնտրել...">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix footer_fon_2 padding_footer">
        <div class="container container_md center_sm">
            <div class="col col_md col_3 col_6_md">
                <h3>ՄԵՆՔ</h3>
                <a href="{{ asset('/masisjan') }}"><p class="margin_top_15 color_white">ՊԱՏՄՈՒԹՅՈՒՆ</p></a>
                <a href="{{ asset('/masisjan') }}"><p class="margin_top_15 color_white">ՆՊԱՏԱԿ</p></a>
                <a href="{{ asset($menu->href) }}"><p class="margin_top_15 color_white">ՆՎԻՐԱՏՎՈՒԹՅՈՒՆ</p></a>
                <a href="{{ asset($menu->href) }}"><p class="margin_top_15 color_white">ԳՈՎԱԶԴ</p></a>
                <a href="{{ asset($menu->href) }}"><p class="margin_top_15 color_white">ԳՈՐԾՆԿԵՐ</p></a>
                <a href="{{ asset('/masisjan/contact') }}"><p class="margin_top_15 color_white">ԿԱՊ</p></a>
                <a href="{{ asset($menu->href) }}"><p class="margin_top_15 color_white">ՄԵՐ ՀԱՐԹԱԿՆԵՐԸ</p></a>
            </div>
            <div class="col col_md col_3 col_6_md">
                <h3 class="border_top_sm">ԹՈՓ ԲԱԺԻՆՆԵՐ</h3>
                @foreach($menus as $menu)
                    <a href="{{ asset($menu->href) }}"><p class="margin_top_15 color_white">{{ $menu->title }}</p></a>
                @endforeach
            </div>
            <div class="col col_md col_3 col_6_md">
                <h3 class="border_top_sm">ԿԱՐԵՎՕՐ</h3>
            </div>
            <div class="col col_md col_3 col_6_md">
                <div class="center">
                    <h3 class="border_top_sm">ՊԱՏԱՀԱԿԱՆ ՎԱՅՐ</h3>
                    <a href="{{ route('places.show') }}">
                        <img src="{{asset('image/app/map_masis.png')}}" class="img_map" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix footer_fon_13">
        <div class="container container_md container_sm clearfix">
            <div class="col col_md col_sm col_6 col_6_sm col_6_md icon_menu">
                <span class="color_white"><i class="far fa-copyright margin_15_0"></i><span class="block_non_sm">masisjan</span> 2018-2021</span>
            </div>
            <div class="col col_md col_sm col_6 col_6_sm col_6_md">
                <a href=""><i class="fas fa-arrow-circle-up icon_top right_xl right_md right_sm"></i></a>
            </div>
        </div>
    </div>
</footer>
</div>

<script src=" {{ asset('js/app.js') }} "></script>
<script src=" {{ asset('js/soc_share.js') }} "></script>
<script src=" {{ asset('js/myapp.js') }} "></script>
<script src=" {{ asset('js/menu_img.js') }} "></script>
<script src=" {{ asset('js/transport.js') }} "></script>
{{--<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
{{--<script src=" {{ asset('js/bootstrap.js') }} "></script>--}}
@stack('scripts')
</body>
</html>
