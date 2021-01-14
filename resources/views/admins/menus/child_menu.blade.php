@foreach($subcategories as $subcategory)
    <ul>
        <li>{{$subcategory->title}}</li>
        @if(count($subcategory->subcategory))
            @include('admins.menus.child_menu',['subcategories' => $subcategory->subcategory])
        @endif
    </ul>
@endforeach
