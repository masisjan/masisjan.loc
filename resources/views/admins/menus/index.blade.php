@extends('layouts.admin')
@section('title', 'Contact App | All contacts')
@section('content')

            <div class="bg_k2 center clearfix">
                <div class="col col_9">
                    <p class="text_houm_tu ">All menu</p>
                </div>
                <div class="col col_3 icon_menu">
                    <a href=" {{ route('admins.menus.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
                </div>
            </div>
            <div>
                <table class="table_blur">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name id</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($menus->count())
                        @foreach($menus as $index => $menu)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $index + $menus->firstItem() }} </td>
                                <td> {{ $menu->icon }} </td>
                                <td> {{ $menu->title }} </td>
                                <td class="icon_menu">
                                    <a href="{{ route('admins.menus.show' , [$menu->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admins.menus.edit', $menu->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admins.menus.destroy', $menu->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
                {{ $menus->links() }}
            </div>

@endsection
