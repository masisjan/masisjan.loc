@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

            <div class="bg_k2 center clearfix">
                <div class="col col_9 col_md col_9_md">
                    <p class="text_houm_tu ">All money</p>
                </div>
                <div class="col col_3 col_md col_3_md icon_menu">
                    <a href=" {{ route('users.money.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
                </div>
            </div>
            <div>
                <table class="table_blur">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($money->count())
                        @foreach($money as $index => $mon)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $mon->money_count }} </td>
                                <td class="icon_menu">
                                    <a href="{{ route('users.money.edit', $mon->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('users.money.destroy', $mon->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
            </div>

@endsection
