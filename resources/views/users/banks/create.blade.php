@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Ավելացնել նոր բանկ</p>
      </div>
      <div><br>
           <form onsubmit='return formValidation()' name='val' action="{{ route('users.banks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.banks._form')
           </form>
      </div>

@endsection
