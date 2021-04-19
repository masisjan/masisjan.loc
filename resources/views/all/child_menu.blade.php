@foreach($subcategories as $subcategory)
        <a class="menu__item accordion" href="{{ asset($subcategory->href) }}"><i class="{{ $subcategory->icon }}" ></i> {{ $subcategory->title }}</a>
        <div class="padding_lr_15 margin_left_3 panel content block_non bgc_nitral">
            @if(count($subcategory->subcategory))
                @include('all.child_menu',['subcategories' => $subcategory->subcategory])
            @endif
        </div>
@endforeach
