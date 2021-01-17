
    <div class="input-container delete">
        <p>Նկար</p>
        @if($event->image)
            <div id="image">
                <img src="{{ asset('storage/uploads/image/events/'. $event->image) }}" style="width:300px" alt="">
                <input type="hidden" id="imgdelete" name="image_delete" value="">
                <span onclick="deleteImg('image')" ><i class="fas fa-times-circle"></i></span>
                <p>Փոփոխել նկարը</p>
            </div>
            <input type="file" name="image" value="{{ old('image', $event->image) }}" class=" @error('image') is-invalid @enderror">
        @else
            <input type="file" name="image" value="{{ old('image', $event->image) }}" class=" @error('image') is-invalid @enderror">
            @error('image')
            <br><div class="invalid-feedback">{{ $message }}</div>
            @enderror
        @endif
    </div>

    <div class="input-container">
        <p>Վերնագիր</p>
        <input type="text" name="title" value="{{ old('title', $event->title) }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <div class="c_red">
               {{ $message }}
            </div>
        @enderror
    </div>

    <div class="input-container">
        <p>Տեքստ</p>
        <pre><textarea type="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="13">{{ old('text', $event->text) }}</textarea>
        </pre>
        @error('text')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="input-container">
        <div id="map" style="height: 400px"></div>
        <input type="hidden" id="cord0" name="cord0" value="{{ old('cord0', $event->cord0) }}">
        <input type="hidden" id="cord1" name="cord1" value="{{ old('cord1', $event->cord1) }}">
        <br>
    </div>

    <div class="input-container">
        <p>Կազմակերպիչ</p>
        <input type="text" name="organizer" value="{{ old('organizer', $event->organizer) }}" class="form-control @error('organizer') is-invalid @enderror">
        @error('organizer')
        <div class="c_red">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="input-container clearfix">
        <p>Նշել միջոցառման ժամանակը</p><br>
        <div class="col col_6 ">
            <p>Սկիզբ</p>
            <input type="text" name="date_start" value="{{ old('date_start', $event->date_start) }}" class="form-control @error('date_start') is-invalid @enderror">
            @error('date_start')
            <div class="c_red">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col col_6">
            <p>Ավարտ</p>
            <input type="text" name="date_end" value="{{ old('date_end', $event->date_end) }}" class="form-control @error('date_end') is-invalid @enderror">
            @error('date_end')
            <div class="c_red">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="input-container">
        <p>Արժեքը</p>
        <input type="text" name="value" value="{{ old('value', $event->value) }}" class="form-control @error('value') is-invalid @enderror">
        @error('value')
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
    <button type="submit" class="btn btn-primary button1 button1_text bg_save">{{ $event->exists ? 'Update' : 'Save' }}</button>
    <a href=" {{ route('users.events.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>

<script src=" {{ asset('js/delete_img.js') }} "></script>
<script src=" {{ asset('js/map_form.js') }} "></script>
