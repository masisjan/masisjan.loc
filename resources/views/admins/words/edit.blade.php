@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update word</p>
    </div>
    <div><br>
        <form action="{{ route('admins.words.update', $word->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('admins.words._form')
        </form>
    </div>

@endsection
