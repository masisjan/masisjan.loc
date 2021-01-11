@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update category</p>
    </div>
    <div><br>
        <form action="{{ route('admins.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('admins.categories._form')
        </form>
    </div>

@endsection
