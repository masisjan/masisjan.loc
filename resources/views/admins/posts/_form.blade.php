<div class="input-container delete">
    <p>Նկար</p>
    @if($post->image)
        <div id="image">
            <img src="{{ asset('storage/uploads/image/posts/'. $post->image) }}" style="width:300px" alt="">
            <input type="hidden" id="imgdelete" name="image_delete" value="">
            <span onclick="deleteImg('image')" ><i class="fas fa-times-circle"></i></span>
            <p>Փոփոխել նկարը</p>
        </div>
        <input type="file" name="image" value="{{ old('image', $post->image) }}" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $post->image) }}" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>

<div class="input-container">
    <p>Վերնագիր</p>
    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="c_red">
           {{ $message }}
        </div>
    @enderror
</div>

<div class="input-container">
    <p>Տեքստ</p>
    <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $post->text) }}</textarea>
    </pre>
    @error('text')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="input-container">
    <p>Աղբյուր url</p>
    <input type="text" name="post_url" value="{{ old('post_url', $post->post_url) }}" class="form-control @error('post_url') is-invalid @enderror">
    @error('post_url')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="input-container delete">
    <p>Նկարներ</p>
        @if($post->images)
            <div id="images">
            @foreach ($images as $image)
                <img src="{{ asset('storage/uploads/image/posts/' . $image) }}" style="width:200px" alt="">
            @endforeach
                <span onclick="deleteImg('images')" ><i class="fas fa-times-circle"></i></span>
                <input type="hidden" id="imgsdelete" name="images_delete" value="">
            <p>Փոփոխել նկարները</p>
            </div>
            <input type="file" multiple name="images[]" value="{{ old('images', $post->images) }}" id="images" class=" @error('images') is-invalid @enderror">
        @else
            <input type="file" multiple name="images[]" value="{{ old('images', $post->images) }}" id="images" class=" @error('images') is-invalid @enderror">
            @error('images')
            <br><div class="c_red">{{ $message }}</div>
            @enderror
        @endif
</div>

<div class="input-container">
    <p>Վիդեո լինկ</p>
    <input type="text" name="text_video" value="{{ old('text_video', $post->text_video) }}" class="form-control @error('text_video') is-invalid @enderror">
    @error('text_video')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="input-container">
    <p>Խոսք</p>
    <input type="text" name="word" value="{{ old('word', $post->word) }}" class="form-control @error('word') is-invalid @enderror">
    @error('word')
    <div class="c_red">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="clearfix">
    <p>Կատեգորիաներ</p>
    @if(count($catPosts) > 0)
        <p class="margin_15_0">Ընտրված կատեգորիաները</p>
            @foreach($catPosts as $catPost)
            <span class="butoon_cat">{{ $catPost->name }}</span>
            @endforeach
        <p class="margin_15_0">Փոփոխել կատեգորիաները</p>
    @endif
    <ul class="ks-cboxtags">
        @foreach($allcategories as $category)
            <li>
                <input type="checkbox" id="{{ $category->id }}" value="{{ $category->id }}" name="categories[]">
                <label for="{{ $category->id }}">{{ $category->name }}</label>
            </li>
        @endforeach
    </ul>
    @error('categories')
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

<hr>
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $post->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('admins.posts.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>

<script src=" {{ asset('js/delete_img.js') }} "></script>
