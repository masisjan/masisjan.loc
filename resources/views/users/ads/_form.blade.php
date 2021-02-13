<div class="input-container">
    <p>Նկար</p>
    @if($ad->image)
        <img src="{{ asset('storage/uploads/image/ads/' . $ad->image) }}" style="width:150px" alt="">
        <p>Փոփոխել նկարը</p>
        <input type="file" name="image" value="{{ old('image', $ad->image) }} }}" id="image" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $ad->image) }}" id="image" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>


<div class="input-container">
    <p>URL</p>
    <input type="text" name="href" value="{{ old('href', $ad->href) }}" class="form-control @error('href') is-invalid @enderror">
    @error('href')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
{{--        <div class="form-group row mb-0">--}}
<div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $ad->exists ? 'Update' : 'Save' }}</button>
    <a href=" {{ route('users.ads.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
</div>
{{--        </div>--}}
