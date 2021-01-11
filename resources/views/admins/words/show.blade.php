@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Show word</p>
    </div>
    <div class="bg_k1 clearfix"><br>
        <p class="text_houm_tu center_sm">{{ $word->title_1 }}</p>
        <p class="text_houm_uan center_sm">{{ $word->title_2 }}</p>
        <p class="text_houm_tu center_sm">{{ $word->title_3 }}</p>
    </div>

        <div class="margin_15_0">
            <a href="{{ route('admins.words.edit', $word->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
            <a href="{{ route('admins.words.destroy', $word->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
            <a href="{{ route('admins.words.index') }}" class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
        </div>
        <form id="form-delete" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

@endsection
