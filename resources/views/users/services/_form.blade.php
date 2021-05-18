<div class="input-container delete">
    <p>Նկար</p>
    @if($service->image)
        <div id="image">
            <img src="{{ asset('storage/uploads/image/services/'. $service->image) }}" style="width:300px" alt="">
            <input type="hidden" id="imgdelete" name="image_delete" value="">
            <span onclick="deleteImg('image')" ><i class="fas fa-times-circle"></i></span>
            <p>Փոփոխել նկարը</p>
        </div>
        <input type="file" name="image" value="{{ old('image', $service->image) }}" class=" @error('image') is-invalid @enderror">
    @else
        <input type="file" name="image" value="{{ old('image', $service->image) }}" class=" @error('image') is-invalid @enderror">
        @error('image')
        <br><div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>

<div class="input-container">
    <p>Անվանում</p>
    <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-control @error('title') is-invalid @enderror">
    <p class="c_red" id="title_val"></p>
    @error('title')
        <div class="c_red">
           {{ $message }}
        </div>
    @enderror
</div>

<div class="input-container">
    <p>Քարտեզի վրա նշել վաճառքի վայրը</p><br>
    <div id="map" style="height: 500px"></div>
    <input type="hidden" id="cord0" name="cord0" value="{{ old('cord0', $service->cord0) }}">
    <input type="hidden" id="cord1" name="cord1" value="{{ old('cord1', $service->cord1) }}">
    <br>
</div>

<div class="input-container clearfix">
    <div class="col col_6 ">
        <p>Կոնտակտային տվյալներ</p><br>
        <p>Ղեկավար</p>
        <input type="text" name="director" value="{{ old('director', $service->director) }}"
               class="form-control @error('director') is-invalid @enderror" placeholder="Օր․ Աշոտ Կարենի Բաղդասարյան">
        <p class="c_red" id="director_val"></p>
        @error('director')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Հասցե</p>
        <input type="text" name="address" value="{{ old('address', $service->address) }}"
               class="form-control @error('address') is-invalid @enderror" placeholder="Օր․ Մասիս, Շիրազի փողոց 9">
        <p class="c_red" id="address_val"></p>
        @error('address')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Հեռախոս</p>
        <input type="text" name="phone" value="{{ old('phone', $service->phone) }}"
               class="form-control @error('phone') is-invalid @enderror" placeholder="Օր․ 033131317">
        <p class="c_red" id="phone_val"></p>
        @error('phone')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Էլ․ փոստ</p>
        <input type="text" name="email" value="{{ old('email', $service->email) }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="Օր․ masisjan@list.ru">
        <p class="c_red" id="email_val"></p>
        @error('email')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Վեբ կայք</p>
        <input type="text" name="site" value="{{ old('site', $service->site) }}"
               class="form-control @error('site') is-invalid @enderror" placeholder="Օր․ https://www.masisjan.net/">
        <p class="c_red" id="site_val"></p>
        @error('site')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>ֆեյսբուքյան էջ</p>
        <input type="text" name="fb" value="{{ old('fb', $service->fb) }}"
               class="form-control @error('fb') is-invalid @enderror" placeholder="Օր․ https://www.facebook.com/masisjan.net">
        <p class="c_red" id="fb_val"></p>
        @error('fb')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col col_6">
        <p>Նշել աշխատանքային ժամերը</p><br>
        <p>Երկուշաբթի</p>
        <input type="text" name="monday" value="{{ old('monday', $service->monday) }}"
               class="form-control @error('monday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        <p class="c_red" id="monday"></p>
        @error('monday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Երեքշաբթի</p>
        <input type="text" name="tuesday" value="{{ old('tuesday', $service->tuesday) }}"
               class="form-control @error('tuesday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        <p class="c_red" id="tuesday"></p>
        @error('tuesday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Չորեքշաբթի</p>
        <input type="text" name="wednesday" value="{{ old('wednesday', $service->wednesday) }}"
               class="form-control @error('wednesday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        <p class="c_red" id="wednesday"></p>
        @error('wednesday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Հինգշաբթի</p>
        <input type="text" name="thursday" value="{{ old('thursday', $service->thursday) }}"
               class="form-control @error('thursday') is-invalid @enderror" placeholder="Օր․ 09:00 - 18:00">
        <p class="c_red" id="thursday"></p>
        @error('thursday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Ուրբաթ</p>
        <input type="text" name="friday" value="{{ old('friday', $service->friday) }}"
               class="form-control @error('friday') is-invalid @enderror" placeholder="Օր․ 09:00 - 17:00">
        <p class="c_red" id="friday"></p>
        @error('friday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Շաբաթ</p>
        <input type="text" name="saturday" value="{{ old('saturday', $service->saturday) }}"
               class="form-control @error('saturday') is-invalid @enderror" placeholder="Օր․ Փակ է կամ թողնել դատարկ">
        <p class="c_red" id="saturday"></p>
        @error('saturday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
        <p>Կիրակի</p>
        <input type="text" name="sunday" value="{{ old('sunday', $service->sunday) }}"
               class="form-control @error('sunday') is-invalid @enderror" placeholder="Օր․ Փակ է կամ թողնել դատարկ">
        <p class="c_red" id="sunday"></p>
        @error('sunday')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="input-container">
    <p>Այլ նշումներ</p>
    <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $service->text) }}</textarea>
    </pre>
    <p class="c_red" id="text_val"></p>
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

@if(auth()->user()->type == 'admin')
<div class="input-container">
    <p>Հաստատել</p>
    <input type="text" name="confirm" value="{{ old('value', $event->confirm) }}">
</div>
@endif

<hr>
<button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $service->exists ? 'Update' : 'Save' }}</button>
<a href=" {{ route('users.services.index', $tab) }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Չեղարկել</a>
<br><br>

<script src=" {{ asset('js/delete_img.js') }} "></script>
<script src=" {{ asset('js/map_form.js') }} "></script>
