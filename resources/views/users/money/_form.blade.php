<div class="input-container">
     <p>Բյուջի գումարը</p>
     <input type="text" name="money_count" value="{{ old('name', $money->money_count) }}" class="form-control @error('money_count') is-invalid @enderror">
     @error('money_count')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
     @enderror
</div>

{{--        <div class="form-group row mb-0">--}}
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $money->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.money.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
{{--        </div>--}}
