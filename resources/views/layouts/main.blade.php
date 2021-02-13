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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <link href=" {{ asset('css/font.css') }} " rel="stylesheet"></head>
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
                            <a class="menu__item" id="all_img1"  href="#"><i class="far fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                            <a class="menu__item" id="all_img2"  href="#"><i class="fas fa-calendar-alt" ></i> ՄԻՋՈՑԱՌՈՒՄՆԵՐ</a>
                            <a class="menu__item" id="all_img3"  href="#"><i class="fas fa-briefcase" ></i> ԱՇԽԱՏԱՆՔ</a>
                            <a class="menu__item" id="all_img4"  href="#"><i class="fas fa-landmark" ></i> ՊԵՏԱԿԱՆ ՄԱՐՄԻՆՆԵՐ</a>
                            <a class="menu__item" id="all_img5"  href="#"><i class="fas fa-id-card" ></i> ՀԵՏԱԴԱՐՁ ԿԱՊ</a>
                        </div>
                        <div class="block_non width_350_0 mytop" id="mytop">
                            <a class="menu__item" id="my_img1"  href="#"><i class="far fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
                            <a class="menu__item" id="my_img2"  href="#"><i class="fas fa-calendar-alt" ></i> ՄԻՋՈՑԱՌՈՒՄՆԵՐ</a>
                            <a class="menu__item" id="my_img3"  href="#"><i class="fas fa-id-card" ></i> ՀԵՏԱԴԱՐՁ ԿԱՊ</a>
                        </div>
                        <div class="width_350_0">
                            <a class="menu__item" id="all_img5"  href="#"><i class="fas fa-circle" ></i> ԲՈԼՈՐԸ</a>
                        </div>
                    </div>
                    <div class="col col_6 menu_img block_non_sm block_non_md">
                        <div class="alltopimg" id="alltop_img">
                            <img id="all_img10" src="{{asset('image/menu/01.jpg')}}" alt="" >
                            <img class="block_non_xl" id="all_img20" src="{{asset('image/menu/02.jpg')}}" alt="" >
                            <img class="block_non_xl" id="all_img30" src="{{asset('image/menu/03.jpg')}}" alt="" >
                            <img class="block_non_xl" id="all_img40" src="{{asset('image/menu/04.jpg')}}" alt="" >
                            <img class="block_non_xl" id="all_img50" src="{{asset('image/menu/05.jpg')}}" alt="" >
                        </div>
                        <div class="block_non_xl mytopimg" id="mytop_img">
                            <img id="my_img10" src="{{asset('image/menu/01.jpg')}}" alt="" >
                            <img class="block_non_xl" id="my_img20" src="{{asset('image/menu/02.jpg')}}" alt="" >
                            <img class="block_non_xl" id="my_img30" src="{{asset('image/menu/05.jpg')}}" alt="" >
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
{{--                    <button type="submit"></button>--}}
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix footer_fon_2 padding_footer">
        <div class="container container_md center_sm">
            <div class="col col_md col_3 col_6_md">
                <p>bajanordagrvel</p>
            </div>
            <div class="col col_md col_3 col_6_md">
                <p>Թոփ բաժիններ</p>
            </div>
            <div class="col col_md col_3 col_6_md">
                <p>Կարևոր</p>
            </div>
            <div class="col col_md col_3 col_6_md">
                <div class="center">
                    <p>Պատահական վայր<br>Մասիսում</p>
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
                <span><i class="far fa-copyright margin_15_0"></i><span class="block_non_sm">masisjan</span> 2018-2021</span>
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
{{--<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
{{--<script src=" {{ asset('js/bootstrap.js') }} "></script>--}}
@stack('scripts')
</body>
</html>
