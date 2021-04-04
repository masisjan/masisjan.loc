@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p><span id="title_name"></span>խմբագրել</p>
    </div>
    <a href=" {{ route('users.transports.create', $tab) }}" id="title_tab" class="block_non"></a>
    <div><br>
        <form onsubmit='return formValidation()' name='val' action="{{ route('users.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.services._form')
        </form>
    </div>

@endsection
