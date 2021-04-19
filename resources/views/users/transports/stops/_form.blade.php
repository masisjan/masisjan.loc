<p class="color_bord margin_15_0">Մինչև կանգառի ավելացնելը պետք է <a href=" {{ route('users.times.create') }} ">լռացնել</a> ժամանակացույցը:</p>
<div class="input-container">
    <p>Կանգառի անունը</p>
    <input type="text" name="name" value="{{ old('name', $stop->name) }}" class="form-control @error('name') is-invalid @enderror">
    @error('name')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Որ երթուղայինի կանգառն է</p>
    <select name="t_id">
        <option value="">Ընտրել</option>
    @foreach($transports as $transport)
        <option value="{{$transport->id}}">{{$transport->title1}} - {{$transport->title2}}</option>
    @endforeach
    </select>
</div>
<div class="input-container" >
    <div class="form_toggle">
        <div class="form_toggle-item item-2">
            <input id="fid-1" type="radio" name="t_name" onclick='kangar(this.value)' value="title1">
            <label for="fid-1">Մեկնում</label>
        </div>
        <div class="form_toggle-item item-2">
            <input id="fid-2" type="radio" name="t_name" onclick='kangar(this.value)' value="title2">
            <label for="fid-2">Ժամանում</label>
        </div>
    </div>
</div>
<div class="input-container">
    <p>Կանգառի հերթականությունը</p>
    <input type="text" name="number" value="{{ old('number', $stop->number) }}" class="form-control @error('number') is-invalid @enderror">
    <div id="kangar" class="color_green"></div>
    @error('number')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Տոմսի արժեքը մինչև կանգառ</p>
    <input type="text" name="value" value="{{ old('value', $stop->value) }}" class="form-control @error('value') is-invalid @enderror">
    @error('value')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Ընտրել Աշխատանքային օրերի ժամերը</p>
    <select name="workdays_id">
        <option value="">Ընտրել</option>
        @foreach($times as $time)
        @if($time->day == "աշխ")
        <option value="{{$time->id}}">{{$time->name}} {{$time->day}}</option>
        @endif
        @endforeach
    </select>
</div>
<div class="input-container">
    <p>Ընտրել Հանգստյան օրերի ժամերը</p>
    <select name="holidays_id">
        <option value="">Ընտրել</option>
        @foreach($times as $time)
        @if($time->day == "ոչ աշխ")
            <option value="{{$time->id}}">{{$time->name}} {{$time->day}}</option>
        @endif
        @endforeach
    </select>
</div>
<div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $stop->exists ? 'Update' : 'Save' }}</button>
    <a href=" {{ route('users.stops.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
</div>
