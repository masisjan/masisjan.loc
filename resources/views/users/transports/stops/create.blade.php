@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Ավելացնել Կանգառ</p>
      </div>
      <div><br>
           <form action="{{ route('users.stops.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.transports.stops._form')
           </form>
      </div>

@endsection
