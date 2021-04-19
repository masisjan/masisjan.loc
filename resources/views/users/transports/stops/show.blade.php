@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <h1 class="p_h1">{{ $stop->name }}</h1>
    <div class="p_date_count">
        <span>{{ $stop->created_at }} </span>
    </div>
    <div class="icon_footer"><br>
            <p>Արժեքը՝ {{ $stop->value }} դրամ</p>
            <p>Մեկնում-Ժամանաում՝ {{ $stop->t_name }}</p>
            <p>Հերթականությունը՝ {{ $stop->number }}</p>
            <p>Երթուղի՝ {{ $stop->transport->title1 }} - {{ $stop->transport->title2 }}</p>
    </div>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.stops.edit', $stop->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.stops.destroy', $stop->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.stops.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>
    <form id="form-delete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="" class="btn btn-outline-secondary button1 button1_text bg_cancel">ԱՎԵԼԱՑՆԵԼ ԿԱՆԳԱՌ</a>
    </div>

@endsection
