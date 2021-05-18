<div class="input-container">
    <p>Նկար</p>
    @if($ally->image)
        <img src="{{ asset('storage/uploads/image/user/ally/' . $ally->image) }}" style="width:150px" alt="">
        <p>Փոփոխել նկարը</p>
        <input type="file" name="image" value="{{ old('image', $ally->image) }} }}" id="image" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $ally->image) }}" id="image" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>
<div class="input-container">
    <p>Բաժին</p>
    <input type="text" name="title" value="{{ old('title', $ally->title) }}" id="title" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="input-container">
    <p>Հռեֆ</p>
    <input type="text" name="href" value="{{ old('href', $ally->href) }}" id="href" class="form-control @error('href') is-invalid @enderror">
    @error('href')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
{{--        <div class="form-group row mb-0">--}}
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $ally->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.allies.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
{{--        </div>--}}
