@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update Ad</p>
    </div>
    <div><br>
        <form action="{{ route('users.ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.ads._form')
        </form>
    </div>

@endsection
