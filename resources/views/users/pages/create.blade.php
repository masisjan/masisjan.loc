@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p><span id="title_name"></span>ավելացնել</p>
      </div>
      <a href=" {{ route('users.pages.create', $tab) }}" class="block_non"></a>
      <div><br>
           <form onsubmit='return formValidation()' name='val' action="{{ route('users.pages.store', $tab) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.pages._form')
           </form>
      </div>

@endsection
