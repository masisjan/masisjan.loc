@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Խմբագրել</p>
    </div>
    <div><br>
        <form onsubmit='return formValidation()' name='val' action="{{ route('users.banks.update', $bank->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('users.banks._form')
        </form>
    </div>

@endsection
