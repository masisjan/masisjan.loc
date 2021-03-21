<div class="input-container delete">
    <p>Նկար</p>
    @if($bank->image)
        <div id="image">
            <img src="{{ asset('storage/uploads/image/banks/'. $bank->image) }}" style="width:300px" alt="">
            <input type="hidden" id="imgdelete" name="image_delete" value="">
            <span onclick="deleteImg('image')" ><i class="fas fa-times-circle"></i></span>
            <p>Փոփոխել նկարը</p>
        </div>
        <input type="file" name="image" value="{{ old('image', $bank->image) }}" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $bank->image) }}" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>

<div class="input-container">
    <p>Անվանում</p>
    <input type="text" name="title" value="{{ old('title', $bank->title) }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="c_red">
           {{ $message }}
        </div>
    @enderror
</div>

<div class="input-container">
    <p>Քարտեզի վրա նշել վաճառքի վայրը</p><br>
    <div id="map" style="height: 500px"></div>
    <input type="hidden" id="cord0" name="cord0" value="{{ old('cord0', $bank->cord0) }}">
    <input type="hidden" id="cord1" name="cord1" value="{{ old('cord1', $bank->cord1) }}">
    <br>
</div>

<div class="input-container clearfix">
    <div class="col col_6 ">
        <p>Կենտակտային տվյալներ</p><br>
        <p>Ղեկավար</p>
        <input type="text" name="director" value="{{ old('director', $bank->director) }}"
               class="form-control @error('director') is-invalid @enderror" placeholder="Օր․ Աշոտ Կարենի Բաղդասարյան">
        @error('director')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Հասցե</p>
        <input type="text" name="address" value="{{ old('address', $bank->address) }}"
               class="form-control @error('address') is-invalid @enderror" placeholder="Օր․ Մասիս, Շիրազի փողոց 9">
        @error('address')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Հեռախոս</p>
        <input type="text" name="phone" value="{{ old('phone', $bank->phone) }}"
               class="form-control @error('phone') is-invalid @enderror" placeholder="Օր․ 033131317">
        @error('phone')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Էլ․ փոստ</p>
        <input type="text" name="email" value="{{ old('email', $bank->email) }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="Օր․ masisjan@list.ru">
        @error('email')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Վեբ կայք</p>
        <input type="text" name="site" value="{{ old('site', $bank->site) }}"
               class="form-control @error('site') is-invalid @enderror" placeholder="Օր․ https://www.masisjan.net/">
        @error('site')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>ֆեյսբուքյան էջ</p>
        <input type="text" name="fb" value="{{ old('fb', $bank->fb) }}"
               class="form-control @error('fb') is-invalid @enderror" placeholder="Օր․ https://www.facebook.com/masisjan.net">
        @error('fb')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col col_6">
        <p>Նշել աշխատանքային ժամերը</p><br>
        <p>Երկուշաբթի</p>
        <input type="text" name="monday" value="{{ old('monday', $bank->monday) }}"
               class="form-control @error('monday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('monday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Երեքշաբթի</p>
        <input type="text" name="tuesday" value="{{ old('tuesday', $bank->tuesday) }}"
               class="form-control @error('tuesday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('tuesday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Չորեքշաբթի</p>
        <input type="text" name="wednesday" value="{{ old('wednesday', $bank->wednesday) }}"
               class="form-control @error('wednesday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('wednesday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Հինգշաբթի</p>
        <input type="text" name="thursday" value="{{ old('thursday', $bank->thursday) }}"
               class="form-control @error('thursday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        @error('thursday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Ուրբաթ</p>
        <input type="text" name="friday" value="{{ old('friday', $bank->friday) }}"
               class="form-control @error('friday') is-invalid @enderror" placeholder="Օր․ 09:00 - 17:00">
        @error('friday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Շաբաթ</p>
        <input type="text" name="saturday" value="{{ old('saturday', $bank->saturday) }}"
               class="form-control @error('saturday') is-invalid @enderror" placeholder="Օր․ Փակ է կամ թողնել դատարկ">
        @error('saturday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Կիրակի</p>
        <input type="text" name="sunday" value="{{ old('sunday', $bank->sunday) }}"
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
    <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $bank->text) }}</textarea>
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
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $bank->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.banks.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
<br><br>

<script src=" {{ asset('js/delete_img.js') }} "></script>
<script src=" {{ asset('js/map_form.js') }} "></script>
