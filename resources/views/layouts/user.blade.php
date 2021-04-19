<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title', 'Contact App') </title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
        <!-- Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    {{--        <link href=" {{ asset('css/bootstrap.min.css') }} " rel="stylesheet">--}}
        <link href=" {{ asset('css/custom.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/style_md.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/style_sm.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/style_xl.css') }} " rel="stylesheet">
    </head>
    <body>
        {{--                          navbar                --}}
        <div class="raz navbar clearfix">
            <div class="container_sm container_md">
                <div>
                    <a href="/"><img src="{{asset('image/app/logo_mj.png')}}" class="logo_mj mg_l_100" alt=""></a>
                </div>
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn block_non_xl block_non_md" for="menu__toggle">
                    <span></span>
                </label>
                <div class="menu__box">
                    @include('users.menuuser')
                </div>
            </div>
        </div>
        {{--                          menu                --}}
        <div class="container container_md padding_head clearfix">
            <div class="vh bg_k2 col col_md col_4 col_4_md block_non_sm">
                @include('users.menuuser')
            </div>
            <div class="col col_md col_8 col_8_md">
                @yield('content')
            </div>
        </div>
        <p class="user_id block_non">{{ auth()->user()->name }}</p>
{{--        <script src=" {{ asset('js/jquery.min.js') }} "></script>--}}
{{--        <script src=" {{ asset('js/popper.min.js') }} "></script>--}}
{{--        <script src=" {{ asset('js/bootstrap.min.js') }} "></script>--}}
        <script src=" {{ asset('js/app.js') }} "></script>
        <script src=" {{ asset('js/delete.js') }} "></script>
        <script src=" {{ asset('js/validate.js') }} "></script>
        <script src=" {{ asset('js/transport.js') }} "></script>
        @stack('scripts')
    </body>
</html>
