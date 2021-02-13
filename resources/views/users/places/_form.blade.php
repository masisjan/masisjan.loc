<div class="input-container">
    <p>Նկար</p>
    @if($place->image)
        <img src="{{ asset('storage/uploads/image/user/place/' . $place->image) }}" style="width:150px" alt="">
        <p>Փոփոխել նկարը</p>
        <input type="file" name="image" value="{{ old('image', $place->image) }} }}" id="image" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $place->image) }}" id="image" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>


<div class="input-container">
    <p>Անվանում</p>
    <input type="text" name="title" value="{{ old('title', $place->title) }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>
{{--        <div class="form-group row mb-0">--}}
<div>
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $place->exists ? 'Update' : 'Save' }}</button>
    <a href=" {{ route('users.menus.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
</div>
{{--        </div>--}}
