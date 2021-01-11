@extends('layouts.admin')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Add New word</p>
      </div>
      <div><br>
           <form action="{{ route('admins.words.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admins.words._form')
           </form>
      </div>

@endsection
