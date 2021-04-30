@extends('layouts.user')
@section('content')
    <div class="bg_k2 center">
        <p class="text_houm_tu">Փոփոխել գաղտնաբառը</p>
    </div>
    <form onsubmit='return formValidation()' name='val' action="{{ route('users.password.update', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="input-container margin_15_0">
        <p>Գործող գաղտնաբառ</p>
        <input type="text" name="old_password" value="" class="form-control @error('old_password') is-invalid @enderror">
        <p class="c_red" id="old_password_val"></p>
        @error('old_password')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-container margin_15_0">
        <p>Նոր գաղտնաբառ</p>
        <input type="text" name="password" value="" class="form-control @error('password') is-invalid @enderror">
        <p class="c_red" id="password_val"></p>
        @error('password')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-container margin_15_0">
        <p>Կրկնեք գաղտնաբառը</p>
        <input type="text" name="password_confirmation" value="" class="form-control @error('password_confirmation') is-invalid @enderror">
        <p class="c_red" id="password_confirmation_val"></p>
        @error('password_confirmation')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $user->exists ? 'Update' : 'Save' }}</button>
    <a href="{{ route('users.setting') }}" class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
    </form>
@endsection
