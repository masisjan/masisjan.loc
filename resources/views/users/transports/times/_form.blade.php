<div class="input-container">
    <p>Երթուղու անունը</p>
    <select name="name">
        <option value="">Ընտրել երթուղին</option>
        @foreach($transports as $transport)
            <option value="{{$transport->id}},{{$transport->title1}} - {{$transport->title2}}">{{$transport->title1}} - {{$transport->title2}}</option>
        @endforeach
    </select>
</div>
<div class="input-container">
    <div class="form_toggle">
        <div class="form_toggle-item item-1">
            <input type="radio" name="day" value="" checked>
            <label>Ընտրել</label>
        </div>
        <div class="form_toggle-item item-2">
            <input id="fid-1" type="radio" name="day" value="ոչ աշխ">
            <label for="fid-1">Ոչ՝ աշխատանքային</label>
        </div>
        <div class="form_toggle-item item-2">
            <input id="fid-2" type="radio" name="day" value="աշխ">
            <label for="fid-2">Աշխատանքային</label>
        </div>
    </div>
</div>
<div class="input-container clearfix">
    <div class="col col_6 col_md col_6_md">
        <p>01:00</p>
        <input type="text" name="t01" value="{{ old('t01', $time->t01) }}" class="form-control @error('t01') is-invalid @enderror">
        @error('t01')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>02:00</p>
        <input type="text" name="t02" value="{{ old('t02', $time->t02) }}" class="form-control @error('t02') is-invalid @enderror">
        @error('t02')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>03:00</p>
        <input type="text" name="t03" value="{{ old('t03', $time->t03) }}" class="form-control @error('t03') is-invalid @enderror">
        @error('t03')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>04:00</p>
        <input type="text" name="t04" value="{{ old('t04', $time->t04) }}" class="form-control @error('t04') is-invalid @enderror">
        @error('t04')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>05:00</p>
        <input type="text" name="t05" value="{{ old('t05', $time->t05) }}" class="form-control @error('t05') is-invalid @enderror">
        @error('t05')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>06:00</p>
        <input type="text" name="t06" value="{{ old('t06', $time->t06) }}" class="form-control @error('t06') is-invalid @enderror">
        @error('t06')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>07:00</p>
        <input type="text" name="t07" value="{{ old('t07', $time->t07) }}" class="form-control @error('t07') is-invalid @enderror">
        @error('t07')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>08:00</p>
        <input type="text" name="t08" value="{{ old('t08', $time->t08) }}" class="form-control @error('t08') is-invalid @enderror">
        @error('t08')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>09:00</p>
        <input type="text" name="t09" value="{{ old('t09', $time->t09) }}" class="form-control @error('t09') is-invalid @enderror">
        @error('t09')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>10:00</p>
        <input type="text" name="t10" value="{{ old('t10', $time->t10) }}" class="form-control @error('t10') is-invalid @enderror">
        @error('t10')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>11:00</p>
        <input type="text" name="t11" value="{{ old('t11', $time->t11) }}" class="form-control @error('t11') is-invalid @enderror">
        @error('t11')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>12:00</p>
        <input type="text" name="t12" value="{{ old('t12', $time->t12) }}" class="form-control @error('t12') is-invalid @enderror">
        @error('t12')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col col_6 col_md col_6_md">
        <p>13:00</p>
        <input type="text" name="t13" value="{{ old('t13', $time->t13) }}" class="form-control @error('t13') is-invalid @enderror">
        @error('t13')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>14:00</p>
        <input type="text" name="t14" value="{{ old('t14', $time->t14) }}" class="form-control @error('t14') is-invalid @enderror">
        @error('t14')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>15:00</p>
        <input type="text" name="t15" value="{{ old('t15', $time->t15) }}" class="form-control @error('t15') is-invalid @enderror">
        @error('t15')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>16:00</p>
        <input type="text" name="t16" value="{{ old('t16', $time->t16) }}" class="form-control @error('t16') is-invalid @enderror">
        @error('t16')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>17:00</p>
        <input type="text" name="t17" value="{{ old('t17', $time->t17) }}" class="form-control @error('t17') is-invalid @enderror">
        @error('t17')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>18:00</p>
        <input type="text" name="t18" value="{{ old('t18', $time->t18) }}" class="form-control @error('t18') is-invalid @enderror">
        @error('t18')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>19:00</p>
        <input type="text" name="t19" value="{{ old('t19', $time->t19) }}" class="form-control @error('t19') is-invalid @enderror">
        @error('t19')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>20:00</p>
        <input type="text" name="t20" value="{{ old('t20', $time->t20) }}" class="form-control @error('t20') is-invalid @enderror">
        @error('t20')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>21:00</p>
        <input type="text" name="t21" value="{{ old('t21', $time->t21) }}" class="form-control @error('t21') is-invalid @enderror">
        @error('t21')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>22:00</p>
        <input type="text" name="t22" value="{{ old('t22', $time->t22) }}" class="form-control @error('t22') is-invalid @enderror">
        @error('t22')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>23:00</p>
        <input type="text" name="t23" value="{{ old('t23', $time->t23) }}" class="form-control @error('t23') is-invalid @enderror">
        @error('t23')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>24:00</p>
        <input type="text" name="t24" value="{{ old('t24', $time->t24) }}" class="form-control @error('t24') is-invalid @enderror">
        @error('t24')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $time->exists ? 'Update' : 'Save' }}</button>
    <a href=" {{ route('users.times.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
</div>
