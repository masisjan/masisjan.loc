@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update Place</p>
    </div>
    <div><br>
        <form action="{{ route('users.places.update', $place->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.places._form')
        </form>
    </div>

@endsection
