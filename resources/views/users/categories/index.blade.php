@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

            <div class="bg_k2 center clearfix">
                <div class="col col_9 col_md col_9_md">
                    <p class="text_houm_tu ">All categories posts</p>
                </div>
                <div class="col col_3 col_md col_3_md icon_menu">
                    <a href=" {{ route('users.categories.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
                </div>
            </div>
            <div>
                <table class="table_blur">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories->count())
                        @foreach($categories as $index => $category)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $index + $categories->firstItem() }} </td>
                                <td> {{ $category->name }} </td>
                                <td class="icon_menu">
                                    <a href="{{ route('users.categories.edit', $category->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('users.categories.destroy', $category->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
                {{ $categories->links() }}
            </div>

@endsection
