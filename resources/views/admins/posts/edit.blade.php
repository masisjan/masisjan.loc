@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update news</p>
    </div>
    <div><br>
        <form action="{{ route('admins.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('admins.posts._form')
        </form>
    </div>

@endsection
