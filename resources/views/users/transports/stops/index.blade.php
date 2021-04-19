@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

    <div class="bg_k2 center clearfix">
        <div class="col col_9 col_md col_9_md">
            <p class="text_houm_tu ">Կանգառներ {{$stops->count()}}</p>
        </div>
        <div class="col col_3 col_md col_3_md icon_menu">
            <a href=" {{ route('users.stops.create') }} "><i class="fas fa-plus-circle margin_15_0"></i></a>
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
                <th>Անուն</th>
                <th>Երթուղային</th>
                <th>Մեկնում - Ժամ․</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
            @if($stops->count())
                @foreach($stops as $index => $stop)
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td class="block_non_sm"> {{ $index + $stops->firstItem() }} </td>
                        <td> {{ $stop->name }}</td>
                        <td> {{ $stop->transport->title1 }} - {{ $stop->transport->title2 }}</td>
                        <td> @if($stop->t_name == "title1") Մեկնում @else Ժամանում @endif</td>
                        <td class="icon_menu">
                            <a href="{{ route('users.stops.show' , [$stop->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.stops.edit', $stop->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.stops.destroy', $stop->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
        {{ $stops->links() }}
    </div>

@endsection
