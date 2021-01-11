@extends('layouts.admin')
@section('title', 'Contact App | All contacts')
@section('content')

            <div class="bg_k2 center clearfix">
                <div class="col col_sm col_md col_9_md col_9 col_9_sm">
                    <p class="text_houm_tu ">All word</p>
                </div>
                <div class="col col_sm col_md col_3_md col_3 col_3_sm icon_menu">
                    <a href=" {{ route('admins.words.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
                </div>
            </div>
            <div>
                <table class="table_blur">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name id</th>
                        <th class="block_non_sm">Title 1</th>
                        <th class="block_non_sm block_non_md">Title 2</th>
                        <th class="block_non_sm">Title 3</th>
                        <th>Action</th>
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
                                    <a href="{{ route('admins.words.show' , [$word->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admins.words.edit', $word->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admins.words.destroy', $word->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
