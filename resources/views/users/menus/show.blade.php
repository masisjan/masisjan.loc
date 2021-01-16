@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_tu center">
        <p>Show Menu</p>
    </div>
    <div class="bg_k1 clearfix"><br>
        <div class="col col_6 icon_menu">
            <a class="menu__item" href="#"><i class="{{ $menu->icon }}" ></i> {{ $menu->title }}</a><hr>
            <a class="menu__item" href="#"><i class="fas fa-text-width" ></i> {{ $menu->text }}</a><hr>
            @if($menu->category_id != 0)
            <a class="menu__item" href="#"><i class="{{ $parent_cat->icon }}" ></i> {{ $parent_cat->title }} բաժնում</a><hr>
            @endif
            <a class="menu__item" href="#"><i class="fa fa-eye" ></i> {{ $menu->count }} դիտում</a><hr>
        </div>
        <div class="col col_6 ">
            <img class="img_map" src="{{asset('storage/uploads/image/user/menu/' . $menu->image)}}" alt="">
        </div>
    </div>

        <div class="col-md-9 offset-md-3 margin_15_0">
            <a href="{{ route('users.menus.edit', $menu->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
            <a href="{{ route('users.menus.destroy', $menu->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
            <a href="{{ route('users.menus.index') }}" class="btn btn-outline-secondary button1 button1_text bg_cancel" >Cancel</a>
        </div>
        <form id="form-delete" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

@endsection
