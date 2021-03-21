@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')
    <div class="bg_k2 text_houm_tu center">
        <p>Խոսքի ցուցադրում</p>
    </div>
    <div class="bg_k1 clearfix"><br>
        <p class="text_houm_tu center_sm">{{ $word->title_1 }}</p>
        <p class="text_houm_uan center_sm">{{ $word->title_2 }}</p>
        <p class="text_houm_tu center_sm">{{ $word->title_3 }}</p>
    </div>
    <div class="margin_15_0 padding_b_5">
        <a href="{{ route('users.words.edit', $word->id) }}" class="btn btn-info button1 button1_text bg_edit">Խմբագրել</a>
        <a href="{{ route('users.words.destroy', $word->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Հեռացնել</a>
        <a href="{{ route('users.words.index') }}" class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
    </div>
    <form id="form-delete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
