<div class="input-container clearfix">
    <div class="col col_6 ">
        <p>Մեկնում համայնք</p>
        <input type="text" name="title1" value="{{ old('title1', $transport->title1) }}" class="form-control @error('title1') is-invalid @enderror">
        @error('title1')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col col_6 ">
        <p>Ժամանում համայնք</p>
        <input type="text" name="title2" value="{{ old('title2', $transport->title2) }}" class="form-control @error('title2') is-invalid @enderror">
        @error('title2')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="input-container">
    <p>Քարտեզը</p>
    <input type="text" name="map" value="{{ old('map', $transport->map) }}" class="form-control @error('map') is-invalid @enderror">
    @error('map')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Համարը</p>
    <input type="text" name="number" value="{{ old('number', $transport->number) }}" class="form-control @error('number') is-invalid @enderror">
    @error('number')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Արժեքը</p>
    <input type="text" name="value" value="{{ old('value', $transport->value) }}" class="form-control @error('value') is-invalid @enderror">
    @error('value')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Տևողությունը րոպե</p>
    <input type="text" name="time" value="{{ old('time', $transport->time) }}" class="form-control @error('time') is-invalid @enderror">
    @error('time')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Երթուղայինի մասին</p>
    <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $transport->text) }}</textarea>
    </pre>
    @error('text')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Հրապարակել</p>
    <div class="form_toggle">
        <div class="form_toggle-item item-1">
            <input id="fid-1" type="radio" name="publish" value="not" checked>
            <label for="fid-1">Ոչ</label>
        </div>
        <div class="form_toggle-item item-2">
            <input id="fid-2" type="radio" name="publish" value="yes">
            <label for="fid-2">Այո</label>
        </div>
    </div>
</div>
<div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $transport->exists ? 'Update' : 'Save' }}</button>
    <a href=" {{ route('users.transports.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
</div>
