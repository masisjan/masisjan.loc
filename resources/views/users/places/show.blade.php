@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Show Place</p>
    </div>
    <div class="bg_k1 clearfix"><br>
        <div class="col col_6 icon_menu">
            <a class="menu__item" href="#"> {{ $place->title }}</a><hr>
            <a class="menu__item" href="#"><i class="fa fa-eye" ></i> {{ $place->count }} դիտում</a><hr>
        </div>
        <div class="col col_6 ">
            <img class="img_map" src="{{asset('storage/uploads/image/user/place/' . $place->image)}}" alt="">
        </div>
    </div>

        <div class="col-md-9 offset-md-3 margin_15_0">
            <a href="{{ route('users.places.edit', $place->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
            <a href="{{ route('users.places.destroy', $place->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
            <a href="{{ route('users.places.index') }}" class="btn btn-outline-secondary button1 button1_text bg_cancel" >Cancel</a>
        </div>
        <form id="form-delete" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

@endsection
