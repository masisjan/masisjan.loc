<div class="col col_6">
        <div class="input-container">
           <p>Բաժին</p>
           <input type="text" name="title" value="{{ old('title', $menu->title) }}" id="title" class="form-control @error('title') is-invalid @enderror">
           @error('title')
           <div class="invalid-feedback">
               {{ $message }}
           </div>
               @enderror
        </div>

        <div class="input-container">
            <p>Իկոն</p>
            <input type="text" name="icon" value="{{ old('icon', $menu->icon) }}" id="icon" class="form-control @error('icon') is-invalid @enderror">
            @error('icon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="input-container">
            <p>Տեքստ</p>
            <input type="text" name="text" value="{{ old('text', $menu->text) }}" id="text" class="form-control @error('text') is-invalid @enderror">
            @error('text')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

    <div class="input-container">
        <p>Հռեֆ</p>
        <input type="text" name="href" value="{{ old('href', $menu->href) }}" id="href" class="form-control @error('href') is-invalid @enderror">
        @error('href')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

{{--        <div class="input-container">--}}
{{--            <p>Ընտրել ենթաբաժինը</p>--}}
{{--            <input type="text" name="category_id" value="{{ old('parent_id', $menu->parent_id) }}" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">--}}
{{--            @error('parent_id')--}}
{{--            <div class="invalid-feedback">--}}
{{--                {{ $message }}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}

    </div>

    <div class="col col_6">
        <div class="input-container">
           <p>Նկար</p>
           @if($menu->image)
               <img src="{{ asset('storage/uploads/image/admin/menu/' . $menu->image) }}" style="width:150px" alt="">
               <p>Փոփոխել նկարը</p>
               <input type="file" name="image" value="{{ old('image', $menu->image) }} }}" id="image" class=" @error('image') is-invalid @enderror">
           @else
               <input type="file" name="image" value="{{ old('image', $menu->image) }}" id="image" class=" @error('image') is-invalid @enderror">
               @error('image')
                   <br><div class="invalid-feedback">{{ $message }}</div>
               @enderror
           @endif
        </div>

</div>
{{--        <div class="form-group row mb-0">--}}
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $menu->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('admins.menus.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
{{--        </div>--}}
