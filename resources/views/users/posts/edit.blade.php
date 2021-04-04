@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update news</p>
    </div>
    <div><br>
        <form onsubmit='return formValidation()' name='val' action="{{ route('users.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.posts._form')
        </form>
    </div>

@endsection
