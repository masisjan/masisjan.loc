@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="bg_k2 center">
        <p class="text_houm_tu ">Օգտատերեր</p>
    </div>
    <div>
        <table class="table_blur">
            <thead>
            <tr>
                <th>#</th>
                <th class="block_non_sm">User id</th>
                <th>Անուն</th>
                <th>Կարգավիճակ</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
            @if($users->count())
                @foreach($users as $index => $user)
                    <tr>
                        <td> {{ $index + $users->firstItem() }} </td>
                        <td class="block_non_sm"> {{ $user->id }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->type }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.profile', $user->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('users.profile.destroy', $user->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
        {{ $users->appends (['sort' => 'voices'])->onEachSide(0)->links() }}
    </div>
@endsection
