@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')
    <div class="clearfix margin_15_0 center">
        <div class="col col_3 col_md col_6_md bg_save">
            <div class="padding_all">
                <b>{{ $post_count }}</b><br>ՆՈՐՈՒԹՅՈՒՆ
            </div>
        </div>
        <div class="col col_3 col_md col_6_md bg_edit">
            <div class="padding_all">
                <b>{{ $event_count }}</b><br>ՄԻՋՈՑԱՌՈՒՄ
            </div>
        </div>
        <div class="col col_3 col_md col_6_md bg_delete">
            <div class="padding_all">
                <b>{{ $service_count }}</b><br>ԿԱԶՄԱԿԵՐՊՈՒԹՅՈՒՆ
            </div>
        </div>
    </div>
    <hr>
@endsection
