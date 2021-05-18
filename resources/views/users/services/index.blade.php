@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="bg_k2 center clearfix">
        <div class="col col_9 col_md col_9_md col_sm col_9_sm">
            <p class="text_houm_tu"><span id="title_name"></span>բոլորը {{ $services->count() }}</p>
        </div>
        <div class="col col_3 col_md col_3_md col_sm col_3_sm icon_menu">
            <a href=" {{ route('users.services.create', $tab) }}" title="Ավելացնել" id="title_tab"><i class="fas fa-plus-circle margin_15_0"></i></a>
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
            @if($services->count())
                @foreach($services as $index => $service)
                    <tr>
                        <td> {{ $index + $services->firstItem() }} </td>
                        <td class="block_non_sm"> {{ $service->id }} </td>
                        <td> {{ $service->title }} </td>
                        <td> {{ $service->publish }} </td>
                        <td class="block_non_md block_non_sm"> {{ $service->count }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.services.show' , $service->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Տեսնել"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.services.edit', $service->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Խմբագրել"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.services.destroy', $service->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Հեռացնել"><i class="fa fa-times"></i></a>
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
        {{ $services->appends (['sort' => 'voices'])->onEachSide(0)->links() }}
    </div>
@endsection
