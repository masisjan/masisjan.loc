@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

    <div class="bg_k2 center clearfix">
        <div class="col col_9 col_md col_9_md">
            <p class="text_houm_tu ">All ads</p>
        </div>
        <div class="col col_3 col_md col_3_md icon_menu">
            @if(auth()->user()->type == 'admin' || $ads->count() == 0)
            <a href=" {{ route('users.ads.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
            @endif
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
                <th class="block_non_sm">Name id</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($ads->count())
                @foreach($ads as $index => $ad)
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td class="block_non_sm"> {{ $index + $ads->firstItem() }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.ads.show' , [$ad->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.ads.edit', $ad->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.ads.destroy', $ad->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
        {{ $ads->onEachSide(0)->links() }}
    </div>

@endsection
