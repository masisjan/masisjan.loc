@foreach($subcategories as $subcategory)
        <div>
            <input type="radio" id="{{$subcategory->id}}" name="category_id" value="{{$subcategory->id}}">
            <label for="{{$subcategory->id}}">{{$subcategory->title}}</label>
        </div>
        <div class="margin_left_3">
            @if(count($subcategory->subcategory))
                @include('users.menus.child_menu',['subcategories' => $subcategory->subcategory])
            @endif
        </div>
@endforeach
