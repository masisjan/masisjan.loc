@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Add New Menu</p>
      </div>
      <div><br>
           <form action="{{ route('admins.menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admins.menus._form')
           </form>
      </div>

@endsection
