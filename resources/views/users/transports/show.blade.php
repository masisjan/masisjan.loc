@extends('layouts.user')
@section('title', 'Contact App | Add new contact')
@section('content')

    <h1 class="p_h1 icon_footer">
        <i class="fas fa-exchange-alt"></i>
        <span>{{ $transport->title1 }}</span> - <span>{{ $transport->title2 }}</span> երթուղի</h1>
    <div class="p_date_count">
        <span>{{ $transport->created_at }} </span>
        <i class="fa fa-eye margin_left_3"></i><span> {{ $transport->count ?? 0 }} դիտում</span>
    </div>
    <div class="clearfix icon_footer"><br>
        <div class="col col_3 col_md col_6_md">
            <i class="fas fa-donate"></i><span>Արժեքը՝ {{ $transport->value }} դրամ</span>
        </div>
        <div class="col col_3 col_md col_6_md">
            <i class="fas fa-clock"></i><span>Ժամանակը՝ {{ $transport->time }} րոպե</span>
        </div>
        <div class="col col_3 col_md col_6_md">
            <i class="fas fa-arrows-alt-h"></i><span>Հեռավոր.՝ 0 կմ</span>
        </div>
        <div class="col col_3 col_md col_6_md">
            <i class="fas ">N</i><span>Համար՝ {{ $transport->number }}</span>
        </div>
    </div>
    <p class="color_bord margin_15_0">Երթուղայինի ժամանակացույցը տեսնելու համար սեղմեք Ձեզ անհրաժեշտ կանգառի վրա</p>
    <div class="clearfix"><br>
        <div class="col col_8 icon_menu">
            <script type="text/javascript" charset="utf-8" async
                    src="{{ $transport->map }}">
            </script>
        </div>
        <div class="col col_4 ">
            <h2 class="center c_red">- Կանգառներ -</h2>
        </div>
    </div>
    <div class="icon_footer">
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-telegram-plane"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
    </div>
    <p class="p_transport">{{ $transport->text }}</p>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="{{ route('users.transports.edit', $transport->id) }}" class="btn btn-info button1 button1_text bg_edit">Edit</a>
        <a href="{{ route('users.transports.destroy', $transport->id) }}" class="btn btn-delete btn-outline-danger button1 button1_text bg_delete">Delete</a>
        <a href=" {{ route('users.transports.index') }} " class="btn btn-outline-secondary button1 button1_text bg_cancel">Cancel</a>
    </div>
    <form id="form-delete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <hr>
    <div class="col-md-9 offset-md-3 margin_15_0">
        <a href="" class="btn btn-outline-secondary button1 button1_text bg_cancel">ԱՎԵԼԱՑՆԵԼ ԿԱՆԳԱՌ</a>
    </div>

@endsection
