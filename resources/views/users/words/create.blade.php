@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Ավելացնել նոր Խոսք</p>
      </div>
      <div><br>
           <form action="{{ route('users.words.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.words._form')
           </form>
      </div>

@endsection
