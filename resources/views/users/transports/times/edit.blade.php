@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Փոփոխել Ժամանակը</p>
    </div>
    <div><br>
        <form action="{{ route('users.times.update', $time->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.transports.times._form')
        </form>
    </div>

@endsection
