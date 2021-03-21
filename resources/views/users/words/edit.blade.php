@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Խմբագրել խոսքը</p>
    </div>
    <div><br>
        <form action="{{ route('users.words.update', $word->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.words._form')
        </form>
    </div>

@endsection
