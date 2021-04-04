@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Ավելացնել երթուղային</p>
      </div>
      <div><br>
           <form action="{{ route('users.transports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.transports._form')
           </form>
      </div>

@endsection
