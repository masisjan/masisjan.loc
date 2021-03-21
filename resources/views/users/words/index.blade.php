@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="bg_k2 center clearfix">
        <div class="col col_sm col_md col_9_md col_9 col_9_sm">
            <p class="text_houm_tu ">Խոսքեր</p>
        </div>
        <div class="col col_sm col_md col_3_md col_3 col_3_sm icon_menu">
            <a href="{{ route('users.words.create') }}" title="Ավելացնել"><i class="fas fa-plus-circle margin_15_0"></i></a>
        </div>
    </div>
    <div>
        <table class="table_blur">
            <thead>
            <tr>
                <th>#</th>
                <th>Համար</th>
                <th class="block_non_sm">Խոսք 1</th>
                <th class="block_non_sm block_non_md">Խոսք 2</th>
                <th class="block_non_sm">Խոսք 3</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
            @if($words->count())
                @foreach($words as $index => $word)
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td> {{ $index + $words->firstItem() }} </td>
                        <td class="block_non_sm"> {{ $word->title_1 }} </td>
                        <td class="block_non_sm block_non_md"> {{ $word->title_2 }} </td>
                        <td class="block_non_sm"> {{ $word->title_3 }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.words.show' , [$word->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Տեսնել"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.words.edit', $word->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Խմբագրել"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.words.destroy', $word->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Հեռացնել"><i class="fa fa-times"></i></a>
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
        {{ $words->links() }}
    </div>
@endsection
