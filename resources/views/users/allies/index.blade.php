@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

            <div class="bg_k2 center clearfix">
                <div class="col col_9 col_md col_9_md">
                    <p class="text_houm_tu ">All ally</p>
                </div>
                <div class="col col_3 col_md col_3_md icon_menu">
                    <a href=" {{ route('users.allies.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
                </div>
            </div>
            <div>
                <table class="table_blur">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="block_non_sm">Name id</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($allies->count())
                        @foreach($allies as $index => $ally)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td class="block_non_sm"> {{ $index + $allies->firstItem() }} </td>
                                <td> {{ $ally->title }} </td>
                                <td class="icon_menu">
                                    <a href="{{ route('users.allies.show' , [$ally->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('users.allies.edit', $ally->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('users.allies.destroy', $ally->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
                {{ $allies->onEachSide(0)->links() }}
            </div>

@endsection
