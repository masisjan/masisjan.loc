@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

      <div class="bg_k2 text_houm_tu center">
           <p>Add New bank</p>
      </div>
      <div><br>
           <form action="{{ route('users.banks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users.banks._form')
           </form>
      </div>

@endsection
