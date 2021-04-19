@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Փոփոխել Կանգառը</p>
    </div>
    <div><br>
        <form action="{{ route('users.stops.update', $stop->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.transports.stops._form')
        </form>
    </div>

@endsection
