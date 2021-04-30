@extends('layouts.user')
@section('content')
    <div class="bg_k2 center">
        <p class="text_houm_tu">Փոփոխել էլ․ փոստը</p>
    </div>
    @if(session()->has('message'))
        <p class="color_green">{{ session()->get('message') }}</p>
    @endif
    <form onsubmit='return formValidation()' name='val' action="{{ route('users.email.update', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="input-container margin_15_0">
        <p>Գործող գաղտնաբառ</p>
        <input type="text" name="old_password" value="{{ old('old_password') }}" class="form-control @error('old_password') is-invalid @enderror">
        <p class="c_red" id="old_password_val"></p>
        @if(session('message') == '2')
            <p class="c_red">Գործող գաղտնաբառը սխալ է</p>
        @endif
        @error('old_password')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-container margin_15_0">
        <p>Նոր էլ․ փոստ</p>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        <p class="c_red" id="email_val"></p>
        @error('email')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $user->exists ? 'Update' : 'Save' }}</button>
    <a href="{{ route('users.setting') }}" class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
    </form>
@endsection
