@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="bg_k2 center">
            <p class="text_houm_tu">Կարգավորումներ</p>
    </div>
    @if(session()->has('message'))
        @include('api._mondal')
    @endif
    <div class="margin_15_0 center">
        <p class="p_h1">Փոխել գաղտնաբառը</p>
        <p class="p_post">Դուք կարող եք փոխել ձեր գաղտնաբառը, մուտքագրելով հին գաղտնաբառը, այնուհետ մուտքագրելով եւ հաստատելով նոր գաղտնաբառը:</p><br>
        <a href="{{ route('users.password') }}" class="button1 button1_text bg_cancel">ՓՈՓՈԽԵԼ</a>
    </div>
    <hr>
    <div class="margin_15_0 center">
        <p class="p_h1">Փոփոխել էլ.փոստի հասցեն</p>
        <p class="p_post">Ձեր էլ. փոստի հասցեն փոխելու համար մուտքագրեք նոր էլ. փոստի հասցեն, որին կուղարկվի նամակ հաստատման համար:</p><br>
        <a href="{{ route('users.email') }}" class="button1 button1_text bg_cancel">ՓՈՓՈԽԵԼ</a>
    </div>
    <hr>
    <div class="margin_15_0 center">
        <p class="p_h1">Հեռացնել հաշիվը</p>
        <p class="p_post">Դուք կարող եք մշտապես հեռացնել ձեր հաշիվը: Ձեր հայտարարությունները եւ այլ տեղեկությունները կհեռացվեն, եւ դուք երբեք չեք կարողանա կրկին օգտագործել այս էլ. փոստի հասցեն Masisjan.net կայքում:</p><br>
        <a href="{{ route('users.profile.destroy', auth()->user()->id) }}" class="btn btn-delete button1 button1_text bg_delete">ՀԵՌԱՑՆԵԼ</a>
    </div>
    <form id="form-delete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <hr>
@endsection
