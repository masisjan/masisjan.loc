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
    <div class="wrapper">
        <div class="contents">
            @yield('content')
        </div>
    </div>

<script src=" {{ asset('js/app.js') }} "></script>
<script src=" {{ asset('js/soc_share.js') }} "></script>
<script src=" {{ asset('js/myapp.js') }} "></script>
</body>
</html>
