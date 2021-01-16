<div class="input-container">
     <p>Նորության բաժին</p>
     <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror">
     @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
     @enderror
</div>

{{--        <div class="form-group row mb-0">--}}
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $category->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.categories.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
{{--        </div>--}}
