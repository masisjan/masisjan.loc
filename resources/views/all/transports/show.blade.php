@extends('layouts.main')
@section('content')
    <div class="padding_head container container_md container_sm clearfix">
        <div class="col col_9 col_md col_9_md b_border b_border_sm">
            <h1 class="p_h1 icon_footer">
                <i class="fas fa-exchange-alt" id="stop_ref"></i>
                <span class="stop_ref">{{ $transport->title1 }} - </span>
                <span>{{ $transport->title2 }}</span>
                <span class="stop_ref block_non"> - {{ $transport->title1 }}</span> երթուղի
            </h1>
            <div class="p_date_count">
                <span>{{ $transport->created_at }} </span>
                <i class="fa fa-eye margin_left_3"></i><span> {{ $transport->count }} դիտում</span>
            </div>
            <img src="{{ $og_image }}" class="input-container" alt="">
            <div class="clearfix">
                <div class="col col_6 col_md col_6_md icon_footer bg_nitral b_r margin_15_0">
                    @include('api._soc_share')
                </div>
                <div class="col col_6 col_md col_6_md bg_nitral b_r">
                    @include('api._rating')
                </div>
            </div>
            <div class="icon_footer"><br>
                <p><i class="fas fa-donate"></i>Արժեքը՝ {{ $transport->value ?? 0 }} դրամ</p>
                <p><i class="fas fa-clock"></i>Ժամանակը՝ {{ $transport->time ?? 0}} րոպե</p>
                <p><i class="fas fa-arrows-alt-h"></i>Հեռավորությունը՝ 0 կմ</p>
                <p><i class="fas ">N</i>Համար՝ {{ $transport->number }}</p>
            </div>
            <p class="color_kapuyt margin_15_0">Երթուղայինի ժամանակացույցը տեսնելու համար սեղմեք Ձեզ անհրաժեշտ կանգառի վրա</p>
            <div class="clearfix"><br>
                <div class="col col_8 margin_15_0">
                    <script type="text/javascript" charset="utf-8" async
                            src="{{ $transport->map }}">
                    </script>
                </div>
                <div class="col col_4 stop_ref">
                    <h2 class="center c_red">- Կանգառներ -</h2>
                    <div class="stops">
                        @foreach($stops as $stop)
                            @if($stop->t_name == "title1")
                                <p class="stopsp" id="s{{ $stop->id }}"><i class="far fa-circle"></i> {{ $stop->name }}</p>
                                <div class="block_non" id="s{{ $stop->id }}p">
                                    @foreach($times as $time)
                                        <div class="day_stop workdays st1">
                                            @if($time->id == $stop->workdays_id)
                                                <span>ԵԿ</span>
                                                <span>ԵՔ</span>
                                                <span>ՉՐ</span>
                                                <span>ՀԳ</span>
                                                <span>ՈՒՐ</span>
                                                <span>ՇԲ</span>
                                                <span>ԿՐ</span>
                                                <p><b>Ժամ։ </b>ռոպե</p>
                                                <p class="bg_nitral"><b>06: </b> {{ $time->t06 }}</p>
                                                <p><b>07: </b> {{ $time->t07 }}</p>
                                                <p class="bg_nitral"><b>08: </b> {{ $time->t08 }}</p>
                                                <p><b>09: </b> {{ $time->t09 }}</p>
                                                <p class="bg_nitral"><b>10: </b> {{ $time->t10 }}</p>
                                                <p><b>11: </b> {{ $time->t11 }}</p>
                                                <p class="bg_nitral"><b>12: </b> {{ $time->t12 }}</p>
                                                <p><b>13: </b> {{ $time->t13 }}</p>
                                                <p class="bg_nitral"><b>14: </b> {{ $time->t14 }}</p>
                                                <p><b>15: </b> {{ $time->t15 }}</p>
                                                <p class="bg_nitral"><b>16: </b> {{ $time->t16 }}</p>
                                                <p><b>17: </b> {{ $time->t17 }}</p>
                                                <p class="bg_nitral"><b>18: </b> {{ $time->t18 }}</p>
                                                <p><b>19: </b> {{ $time->t19 }}</p>
                                                <p class="bg_nitral"><b>20: </b> {{ $time->t20 }}</p>
                                                <p><b>21: </b> {{ $time->t21 }}</p>
                                                <p class="bg_nitral"><b>22: </b> {{ $time->t22 }}</p>
                                                <p><b>23: </b> {{ $time->t23 }}</p>
                                            @endif
                                        </div>
                                        <div class="day_stop holidays block_non st1">
                                            @if($time->id == $stop->holidays_id)
                                                <span>ԵԿ</span>
                                                <span>ԵՔ</span>
                                                <span>ՉՐ</span>
                                                <span>ՀԳ</span>
                                                <span>ՈՒՐ</span>
                                                <span>ՇԲ</span>
                                                <span>ԿՐ</span>
                                                <p><b>Ժամ։ </b>ռոպե</p>
                                                <p class="bg_nitral"><b>06: </b> {{ $time->t06 }}</p>
                                                <p><b>07: </b> {{ $time->t07 }}</p>
                                                <p class="bg_nitral"><b>08: </b> {{ $time->t08 }}</p>
                                                <p><b>09: </b> {{ $time->t09 }}</p>
                                                <p class="bg_nitral"><b>10: </b> {{ $time->t10 }}</p>
                                                <p><b>11: </b> {{ $time->t11 }}</p>
                                                <p class="bg_nitral"><b>12: </b> {{ $time->t12 }}</p>
                                                <p><b>13: </b> {{ $time->t13 }}</p>
                                                <p class="bg_nitral"><b>14: </b> {{ $time->t14 }}</p>
                                                <p><b>15: </b> {{ $time->t15 }}</p>
                                                <p class="bg_nitral"><b>16: </b> {{ $time->t16 }}</p>
                                                <p><b>17: </b> {{ $time->t17 }}</p>
                                                <p class="bg_nitral"><b>18: </b> {{ $time->t18 }}</p>
                                                <p><b>19: </b> {{ $time->t19 }}</p>
                                                <p class="bg_nitral"><b>20: </b> {{ $time->t20 }}</p>
                                                <p><b>21: </b> {{ $time->t21 }}</p>
                                                <p class="bg_nitral"><b>22: </b> {{ $time->t22 }}</p>
                                                <p><b>23: </b> {{ $time->t23 }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col col_4 stop_ref block_non">
                    <h2 class="center c_red">- Կանգառներ -</h2>
                    <div class="stops">
                        @foreach($stops as $stop)
                            @if($stop->t_name == "title2")
                                <p class="stopsp" id="s{{ $stop->id }}"><i class="far fa-circle"></i> {{ $stop->name }}</p>
                                <div class="block_non" id="s{{ $stop->id }}p">
                                    @foreach($times as $time)
                                        <div class="day_stop workdays st1">
                                            @if($time->id == $stop->workdays_id)
                                                <span>ԵԿ</span>
                                                <span>ԵՔ</span>
                                                <span>ՉՐ</span>
                                                <span>ՀԳ</span>
                                                <span>ՈՒՐ</span>
                                                <span>ՇԲ</span>
                                                <span>ԿՐ</span>
                                                <p><b>Ժամ։ </b>ռոպե</p>
                                                <p class="bg_nitral"><b>06: </b> {{ $time->t06 }}</p>
                                                <p><b>07: </b> {{ $time->t07 }}</p>
                                                <p class="bg_nitral"><b>08: </b> {{ $time->t08 }}</p>
                                                <p><b>09: </b> {{ $time->t09 }}</p>
                                                <p class="bg_nitral"><b>10: </b> {{ $time->t10 }}</p>
                                                <p><b>11: </b> {{ $time->t11 }}</p>
                                                <p class="bg_nitral"><b>12: </b> {{ $time->t12 }}</p>
                                                <p><b>13: </b> {{ $time->t13 }}</p>
                                                <p class="bg_nitral"><b>14: </b> {{ $time->t14 }}</p>
                                                <p><b>15: </b> {{ $time->t15 }}</p>
                                                <p class="bg_nitral"><b>16: </b> {{ $time->t16 }}</p>
                                                <p><b>17: </b> {{ $time->t17 }}</p>
                                                <p class="bg_nitral"><b>18: </b> {{ $time->t18 }}</p>
                                                <p><b>19: </b> {{ $time->t19 }}</p>
                                                <p class="bg_nitral"><b>20: </b> {{ $time->t20 }}</p>
                                                <p><b>21: </b> {{ $time->t21 }}</p>
                                                <p class="bg_nitral"><b>22: </b> {{ $time->t22 }}</p>
                                                <p><b>23: </b> {{ $time->t23 }}</p>
                                            @endif
                                        </div>
                                        <div class="day_stop holidays block_non st1">
                                            @if($time->id == $stop->holidays_id)
                                                <span>ԵԿ</span>
                                                <span>ԵՔ</span>
                                                <span>ՉՐ</span>
                                                <span>ՀԳ</span>
                                                <span>ՈՒՐ</span>
                                                <span>ՇԲ</span>
                                                <span>ԿՐ</span>
                                                <p><b>Ժամ։ </b>ռոպե</p>
                                                <p class="bg_nitral"><b>06: </b> {{ $time->t06 }}</p>
                                                <p><b>07: </b> {{ $time->t07 }}</p>
                                                <p class="bg_nitral"><b>08: </b> {{ $time->t08 }}</p>
                                                <p><b>09: </b> {{ $time->t09 }}</p>
                                                <p class="bg_nitral"><b>10: </b> {{ $time->t10 }}</p>
                                                <p><b>11: </b> {{ $time->t11 }}</p>
                                                <p class="bg_nitral"><b>12: </b> {{ $time->t12 }}</p>
                                                <p><b>13: </b> {{ $time->t13 }}</p>
                                                <p class="bg_nitral"><b>14: </b> {{ $time->t14 }}</p>
                                                <p><b>15: </b> {{ $time->t15 }}</p>
                                                <p class="bg_nitral"><b>16: </b> {{ $time->t16 }}</p>
                                                <p><b>17: </b> {{ $time->t17 }}</p>
                                                <p class="bg_nitral"><b>18: </b> {{ $time->t18 }}</p>
                                                <p><b>19: </b> {{ $time->t19 }}</p>
                                                <p class="bg_nitral"><b>20: </b> {{ $time->t20 }}</p>
                                                <p><b>21: </b> {{ $time->t21 }}</p>
                                                <p class="bg_nitral"><b>22: </b> {{ $time->t22 }}</p>
                                                <p><b>23: </b> {{ $time->t23 }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="p_transport margin_15_0">{{ $transport->text }}</p>
            <div class="clearfix margin_15_0">
                <div class="col col_6 col_md col_6_md icon_footer bg_nitral b_r margin_15_0">
                    @include('api._soc_share')
                </div>
                <div class="col col_6 col_md col_6_md margin_15_0"><br>
                    <a href="{{ route('transports') }}" class="button1 button1_text">Մասիսի բոլոր երթուղայինները</a>
                </div>
            </div>
        </div>
        <div class="col col_3 col_md col_3_md relative">
            @include('api._baner_right')
        </div>
    </div>
    @include('api._button_all')

@endsection
