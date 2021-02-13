@extends('layouts.place')
@section('content')
    <div class="relative">
        <a href="/"><img src="{{asset('image/app/logo_mj.png')}}" class="logo_mj logo_place" alt=""></a>
        <img src="{{ asset($og_image) }}" class="fullscreen-bg" alt="">
        <div class="block_place">
            <p class="padding_all">{{ $place->title }}</p>
            <div class="icon_footer padding_lr_15">
                @include('api._soc_share')<a href="{{ route('places.show') }}"><i class="fas fa-sync"></i></a>
            </div>
        </div>
    </div>

@endsection
