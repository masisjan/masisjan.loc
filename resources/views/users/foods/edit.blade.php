@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update food</p>
    </div>
    <div><br>
        <form action="{{ route('users.foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.foods._form')
        </form>
    </div>

@endsection