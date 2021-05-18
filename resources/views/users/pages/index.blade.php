@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="bg_k2 center clearfix">
        <div class="col col_9 col_md col_9_md col_sm col_9_sm">
            <p class="text_houm_tu"><span id="title_name"></span>բոլորը {{ $pages->count() }}</p>
        </div>
        <div class="col col_3 col_md col_3_md col_sm col_3_sm icon_menu">
            <a href=" {{ route('users.pages.create', $tab) }}" title="Ավելացնել" id="title_tab"><i class="fas fa-plus-circle margin_15_0"></i></a>
        </div>
    </div>
    @if(session()->has('message'))
    <p class="color_green">{{ session()->get('message') }}</p>
    @endif
    <div>
        <table class="table_blur">
            <thead>
            <tr>
                <th>#</th>
                <th class="block_non_sm">Համար</th>
                <th>Վերնագիր</th>
                <th>Հրապարակել</th>
                <th class="block_non_md block_non_sm">Դիտում</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
            @if($pages->count())
                @foreach($pages as $index => $page)
                    <tr>
                        <td> {{ $index + $pages->firstItem() }} </td>
                        <td class="block_non_sm"> {{ $page->id }} </td>
                        <td> {{ $page->title }} </td>
                        <td> {{ $page->publish }} </td>
                        <td class="block_non_md block_non_sm"> {{ $page->count }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.pages.show' , $page->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Տեսնել"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.pages.edit', $page->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Խմբագրել"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.pages.destroy', $page->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Հեռացնել"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                <form id="form-delete" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
            </tbody>
        </table>
        {{ $pages->appends (['sort' => 'voices'])->onEachSide(0)->links() }}
    </div>
@endsection
