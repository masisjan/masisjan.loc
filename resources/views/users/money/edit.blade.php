@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update money</p>
    </div>
    <div><br>
        <form action="{{ route('users.money.update', $money->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.money._form')
        </form>
    </div>

@endsection
