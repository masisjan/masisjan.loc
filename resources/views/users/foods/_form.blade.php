<div class="input-container delete">
    <p>Նկար</p>
    @if($food->image)
        <div id="image">
            <img src="{{ asset('storage/uploads/image/foods/'. $food->image) }}" style="width:300px" alt="">
            <input type="hidden" id="imgdelete" name="image_delete" value="">
            <span onclick="deleteImg('image')" ><i class="fas fa-times-circle"></i></span>
            <p>Փոփոխել նկարը</p>
        </div>
        <input type="file" name="image" value="{{ old('image', $food->image) }}" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $food->image) }}" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>

<div class="input-container">
    <p>Անվանում</p>
    <input type="text" name="title" value="{{ old('title', $food->title) }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="c_red">
           {{ $message }}
        </div>
    @enderror
</div>

<div class="input-container">
    <p>Քարտեզի վրա նշել վայրը</p><br>
    <div id="map" style="height: 500px"></div>
    <input type="hidden" id="cord0" name="cord0" value="{{ old('cord0', $food->cord0) }}">
    <input type="hidden" id="cord1" name="cord1" value="{{ old('cord1', $food->cord1) }}">
    <br>
</div>

<div class="input-container clearfix">
    <div class="col col_6 ">
        <p>Կոնտակտային տվյալներ</p>
        <p class="margin_top_15">Ղեկավար</p>
        <input type="text" name="director" value="{{ old('director', $food->director) }}"
               class="form-control @error('director') is-invalid @enderror" placeholder="Օր․ Աշոտ Կարենի Բաղդասարյան">
        @error('director')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Հասցե</p>
        <input type="text" name="address" value="{{ old('address', $food->address) }}"
               class="form-control @error('address') is-invalid @enderror" placeholder="Օր․ Մասիս, Շիրազի փողոց 9">
        @error('address')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Հեռախոս</p>
        <input type="text" name="phone" value="{{ old('phone', $food->phone) }}"
               class="form-control @error('phone') is-invalid @enderror" placeholder="Օր․ 033131317">
        @error('phone')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Էլ․ փոստ</p>
        <input type="text" name="email" value="{{ old('email', $food->email) }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="Օր․ masisjan@list.ru">
        @error('email')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Վեբ կայք</p>
        <input type="text" name="site" value="{{ old('site', $food->site) }}"
               class="form-control @error('site') is-invalid @enderror" placeholder="Օր․ https://www.masisjan.net/">
        @error('site')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">ֆեյսբուքյան էջ</p>
        <input type="text" name="fb" value="{{ old('fb', $food->fb) }}"
               class="form-control @error('fb') is-invalid @enderror" placeholder="Օր․ https://www.facebook.com/masisjan.net">
        @error('fb')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col col_6">
        <p>Նշել աշխատանքային ժամերը</p>
        <p class="margin_top_15">Երկուշաբթի</p>
        <input type="text" name="monday" value="{{ old('monday', $food->monday) }}"
               class="form-control @error('monday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('monday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Երեքշաբթի</p>
        <input type="text" name="tuesday" value="{{ old('tuesday', $food->tuesday) }}"
               class="form-control @error('tuesday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('tuesday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Չորեքշաբթի</p>
        <input type="text" name="wednesday" value="{{ old('wednesday', $food->wednesday) }}"
               class="form-control @error('wednesday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('wednesday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Հինգշաբթի</p>
        <input type="text" name="thursday" value="{{ old('thursday', $food->thursday) }}"
               class="form-control @error('thursday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('thursday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Ուրբաթ</p>
        <input type="text" name="friday" value="{{ old('friday', $food->friday) }}"
               class="form-control @error('friday') is-invalid @enderror" placeholder="Օր․ 09:00 - 17:00">
        @error('friday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Շաբաթ</p>
        <input type="text" name="saturday" value="{{ old('saturday', $food->saturday) }}"
               class="form-control @error('saturday') is-invalid @enderror" placeholder="Օր․ Փակ է կամ թողնել դատարկ">
        @error('saturday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p class="margin_top_15">Կիրակի</p>
        <input type="text" name="sunday" value="{{ old('sunday', $food->sunday) }}"
               class="form-control @error('sunday') is-invalid @enderror" placeholder="Օր․ Փակ է կամ թողնել դատարկ">
        @error('sunday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="input-container">
    <p>Այլ նշումներ</p>
    <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $food->text) }}</textarea>
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

<hr>
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $food->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.foods.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>

<script src=" {{ asset('js/delete_img.js') }} "></script>
<script src=" {{ asset('js/map_form.js') }} "></script>
