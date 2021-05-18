@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Update Ally</p>
    </div>
    <div><br>
        <form action="{{ route('users.allies.update', $ally->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.allies._form')
        </form>
    </div>

@endsection
