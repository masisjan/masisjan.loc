@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="clearfix margin_15_0 center">
        <div class="col col_3 col_md col_6_md bg_save">
            <div class="padding_all">
                <b>{{ $post_count }}</b><br>ՆՈՐՈՒԹՅՈՒՆ
            </div>
        </div>
        <div class="col col_3 col_md col_6_md bg_cancel">
            <div class="padding_all">
                <b>{{ $user_count }}</b><br>ՕԳՏԱՏԵՐ
            </div>
        </div>
        <div class="col col_3 col_md col_6_md bg_edit">
            <div class="padding_all">
                <b>{{ $event_count }}</b><br>ՄԻՋՈՑԱՌՈՒՄ
            </div>
        </div>
        <div class="col col_3 col_md col_6_md bg_delete">
            <div class="padding_all">
                <b>0</b><br>ԿԱԶՄԱԿԵՐՊՈՒԹՅՈՒՆ
            </div>
        </div>
    </div>
    <hr>
    @if($posts->count())
    <p class="p_h1">ՆՈՐՈՒԹՅՈՒՆՆԵՐ</p>
    <div class="margin_15_0">
        <table class="table_blur">
            <thead>
            <tr>
                <th class="block_non_sm">Id</th>
                <th>Վերնագիր</th>
                <th>Publish</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                    <tr>
                        <td class="block_non_sm"> {{ $post->id }}</td>
                        <td> {{ $post->title }} </td>
                        <td> {{ $post->publish }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.posts.show' , [$post->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.posts.edit', $post->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->appends (['sort' => 'voices'])->links() }}
    </div>
    <hr>
    @endif
    @if($events->count())
    <p class="p_h1">ՄԻՋՈՑԱՌՈՒՄՆԵՐ</p>
    <div class="margin_15_0">
        <table class="table_blur">
            <thead>
            <tr>
                <th class="block_non_sm">Id</th>
                <th>Վերնագիր</th>
                <th>Publish</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
                @foreach($events as $index => $event)
                    <tr>
                        <td class="block_non_sm"> {{ $event->id }}</td>
                        <td> {{ $event->title }} </td>
                        <td> {{ $event->publish }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.events.show' , [$event->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.events.edit', $event->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->appends (['sort' => 'voices'])->links() }}
    </div>
    <hr>
    @endif
    @if($services->count())
    <p class="p_h1">ԿԱԶՄԱԿԵՐՊՈՒԹՅՈՒՆՆԵՐ</p>
    <div class="margin_15_0">
        <table class="table_blur">
            <thead>
            <tr>
                <th class="block_non_sm">Id</th>
                <th>Վերնագիր</th>
                <th>Publish</th>
                <th>Գործել</th>
            </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
                    <tr>
                        <td class="block_non_sm"> {{ $service->id }}</td>
                        <td> {{ $service->title }} </td>
                        <td> {{ $service->publish }} </td>
                        <td class="icon_menu">
                            <a href="{{ route('users.services.show' , [$service->id]) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.services.edit', $service->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $services->appends (['sort' => 'voices'])->links() }}
    </div>
    <hr>
    @endif
    <div class="clearfix margin_15_0 center">
        <div class="col col_6 col_md col_6_md bg_edit">
            <div class="padding_all">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmasisjan.net%2F&amp;tabs=timeline&amp;width=180&amp;height=100&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=460138674085350" width="180" height="100" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
        <div class="col col_6 col_md col_6_md bg_cancel">
            <div class="padding_all">
            </div>
        </div>
    </div>
@endsection
