<div class="input-container">
    <p>Title 1</p>
    <input type="text" name="title_1" value="{{ old('title_1', $word->title_1) }}" class="form-control @error('title_1') is-invalid @enderror">
    @error('title_1')
        <div class="invalid-feedback">
           {{ $message }}
        </div>
    @enderror
</div>

<div class="input-container">
    <p>Title 2</p>
    <input type="text" name="title_2" value="{{ old('title_2', $word->title_2) }}" class="form-control @error('title_2') is-invalid @enderror">
    @error('title_2')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="input-container">
    <p>Title 3</p>
    <input type="text" name="title_3" value="{{ old('title_3', $word->title_3) }}" class="form-control @error('title_3') is-invalid @enderror">
    @error('title_3')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $word->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('admins.words.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
