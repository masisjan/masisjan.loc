@foreach($subcategories as $subcategory)
    @if($subcategory->href =='#!')
    <a class="menu__item accordion" href="#!">
    @else
    <a class="menu__item accordion" href="{{ asset('/users/' . $subcategory->href) }}">
    @endif
        <i class="{{ $subcategory->icon }}" ></i> {{ $subcategory->title }}
    </a>
    <div class="padding_lr_15 margin_left_3 panel content block_non bgc_nitral">
        @if(count($subcategory->subcategory))
            @include('users.child_menu',['subcategories' => $subcategory->subcategory])
        @endif
    </div>
@endforeach
