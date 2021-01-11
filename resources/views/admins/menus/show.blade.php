@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

    <div class="bg_k2 text_houm_fri center">
        <p>Show Menu</p>
    </div>
    <div class="bg_k1 clearfix"><br>
        <div class="col col_6 icon_menu">
            <a class="menu__item" href="#"><i class="far fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
        </div>
        <div class="col col_6">
            <img class="width_350" src="{{asset('image/menu/01.jpg')}}" alt="">
        </div>
    </div>

        <div class="col-md-9 offset-md-3">
            <a href="{{ route('admins.menus.edit', $menu->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('admins.menus.destroy', $menu->id) }}" class="btn btn-delete btn-outline-danger">Delete</a>
            <a href="{{ route('admins.menus.index') }}" class="btn btn-outline-secondary" >Cancel</a>
        </div>
        <form id="form-delete" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

@endsection
