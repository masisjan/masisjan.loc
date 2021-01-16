@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Add New money</p>
      </div>
      <div><br>
           <form action="{{ route('users.money.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.money._form')
           </form>
      </div>

@endsection
