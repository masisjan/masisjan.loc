@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Add New news</p>
      </div>
      <div><br>
           <form action="{{ route('admins.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admins.posts._form')
           </form>
      </div>

@endsection
