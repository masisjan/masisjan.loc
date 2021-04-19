@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

    <div class="bg_k2 center clearfix">
        <div class="col col_9 col_md col_9_md">
            <p class="text_houm_tu ">Կանգառների ժամերը {{$times->count()}}</p>
        </div>
        <div class="col col_3 col_md col_3_md icon_menu">
            <a href=" {{ route('users.times.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
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
                <th class="block_non_sm">Համար id</th>
                <th>Երթուղի</th>
                <th>Օրեր</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
            @if($times->count())
                @foreach($times as $index => $time)
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td class="block_non_sm"> {{ $index + $times->firstItem() }} </td>
                        <td> {{ $time->name }}</td>
                        <td> {{ $time->day }}</td>
                        <td class="icon_menu">
                            <a href="{{ route('users.times.edit', $time->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.times.destroy', $time->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
        {{ $times->links() }}
    </div>

@endsection
