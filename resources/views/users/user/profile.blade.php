@extends('layouts.user')
@section('content')
    <div class="bg_k2 center">
        <p class="text_houm_tu">Պռոֆիլ</p>
    </div>
    @if(session()->has('message'))
    @include('api._mondal')
    @endif
    <form onsubmit='return formValidation()' name='val' action="{{ route('users.profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="input-container margin_15_0">
        <p>Ձեր անհատական id</p>
        <input type="text" readonly value="{{ $user->id }}" class="form-control bgc_nitral">
    </div>
    <div class="input-container margin_15_0">
        <p>Ձեր Էլ. փոստի հասցեն</p>
        <input type="text" readonly value="{{ $user->email }}" class="form-control bgc_nitral">
    </div>
    <div class="input-container margin_15_0">
        <p>Ձեր անունը</p>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-container margin_15_0">
        <p>Ձեր հեռախոսահամարը</p>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control @error('phone') is-invalid @enderror">
        <p class="c_red" id="phone_val"></p>
        <p class="c_red" id="title_val"></p>
        @error('phone')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-container margin_15_0">
        <p>Ձեր բնակության հասցեն</p>
        <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control @error('address') is-invalid @enderror">
        <p class="c_red" id="address_val"></p>
        @error('address')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    @if(auth()->user()->type == 'admin')
    <div class="input-container margin_15_0">
        <p>Կարգավիճակ</p>
        <input type="text" name="type" value="{{ old('type', $user->type) }}" class="form-control @error('type') is-invalid @enderror">
        @error('type')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    @endif
    <p>Նշել ծննդյան ամսաթիվը</p>
    <div class="input-container margin_15_0">
        <p class="margin_top_15">Օր</p>
        <select name="day[]">
            @if($day)
            <option value="{{ $day }}">{{ $day }}</option>
            @else
            <option value="">Ընտրել</option>
            @endif
            @for($o = 1; $o < 32; $o++)
            <option value="{{ $o }}">{{ $o }}</option>
            @endfor
        </select>
        <p class="margin_top_15">Ամիս</p>
        <select name="month[]">
            @if($day)
                <option value="{{ $month }}">{{ $month }}</option>
            @else
                <option value="">Ընտրել</option>
            @endif
            <option value="01">Հունվար</option>
            <option value="02">Փետրվար</option>
            <option value="03">Մարտ</option>
            <option value="04">Ապրիլ</option>
            <option value="05">Մայիս</option>
            <option value="06">Հունիս</option>
            <option value="07">Հուլիս</option>
            <option value="08">Օգոստոս</option>
            <option value="09">Սեպտեմբեր</option>
            <option value="10">Հոկտեմբեր</option>
            <option value="11">Նոյեմբեր</option>
            <option value="12">Դեկտեմբեր</option>
        </select>
        <p class="margin_top_15">Տարի</p>
        <select name="year[]">
            @if($day)
                <option value="{{ $year }}">{{ $year }}</option>
            @else
                <option value="">Ընտրել</option>
            @endif
            @for($i = 1929; $i < 2011; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $user->exists ? 'Update' : 'Save' }}</button>
    </form>
@endsection
