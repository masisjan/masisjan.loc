@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Ավելացնել Ժամանակ</p>
      </div>
      <div><br>
           <form action="{{ route('users.times.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.transports.times._form')
           </form>
      </div>

@endsection
