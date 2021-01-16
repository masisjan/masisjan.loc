@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Add New news</p>
      </div>
      <div><br>
           <form action="{{ route('users.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.posts._form')
           </form>
      </div>

@endsection
