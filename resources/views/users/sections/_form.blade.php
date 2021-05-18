<div class="input-container delete">
    <p>Նկար</p>
    @if($section->image)
        <div id="image">
            <img src="{{ asset('storage/uploads/image/sections/'. $section->image) }}" style="width:300px" alt="">
            <input type="hidden" id="imgdelete" name="image_delete" value="">
            <span onclick="deleteImg('image')" ><i class="fas fa-times-circle"></i></span>
            <p>Փոփոխել նկարը</p>
        </div>
        <input type="file" name="image" value="{{ old('image', $section->image) }}" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $section->image) }}" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>

<div class="input-container">
    <p>Անուն</p>
    <input type="text" name="title" value="{{ old('title', $section->title) }}" class="form-control @error('title') is-invalid @enderror">
    <p class="c_red" id="title_val"></p>
    @error('title')
        <div class="c_red">
           {{ $message }}
        </div>
    @enderror
</div>

<div class="input-container">
    <p>Քարտեզի վրա նշել վայրը</p><br>
    <div id="map" style="height: 500px"></div>
    <input type="hidden" id="cord0" name="cord0" value="{{ old('cord0', $section->cord0) }}">
    <input type="hidden" id="cord1" name="cord1" value="{{ old('cord1', $section->cord1) }}">
    <br>
</div>

<div class="input-container">
    <p>Տեքստ</p>
    <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $section->text) }}</textarea>
    </pre>
    <p class="c_red" id="text_val"></p>
    @error('text')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="input-container delete">
    <p>Նկարներ</p>
        @if($section->images)
            <div id="images">
            @foreach ($images as $image)
                <img src="{{ asset('storage/uploads/image/sections/' . $image) }}" style="width:200px" alt="">
            @endforeach
                <span onclick="deleteImg('images')" ><i class="fas fa-times-circle"></i></span>
                <input type="hidden" id="imgsdelete" name="images_delete" value="">
            <p>Փոփոխել նկարները</p>
            </div>
            <input type="file" multiple name="images[]" value="{{ old('images', $section->images) }}" id="images" class=" @error('images') is-invalid @enderror">
        @else
            <input type="file" multiple name="images[]" value="{{ old('images', $section->images) }}" id="images" class=" @error('images') is-invalid @enderror">
            @error('images')
            <br><div class="c_red">{{ $message }}</div>
            @enderror
        @endif
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

<hr>
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $section->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.sections.index', $tab) }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>

<script src=" {{ asset('js/delete_img.js') }} "></script>
<script src=" {{ asset('js/map_form.js') }} "></script>
