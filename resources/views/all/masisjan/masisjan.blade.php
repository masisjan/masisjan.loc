@extends('layouts.main')
@section('content')
    <div class="fullscreen-bg fon_about padding-top center">
        <h1 class="bg_rgba_grey p_h1 inline_block padding_all width_70" id="colorpad">
            Masisjan տեղեկատվական կայքի նպատակն է կայունորեն հավաքագրել Մասիս քաղաքի վերաբերյալ բոլոր տվյալները, տեղեկատվությունները և ավելի մատչելի կերպով այն ներկայացնել բնակիչներին․
            <br><a href="#istory" ><img src="{{asset('image/app/button_nerqev.png')}}" class="button_nerqev more" alt=""></a>
        </h1>
    </div>
    <div class="container container_md" id="istory">
        <p class="p_h1 padding_head">Masisjan-ը ստեղծվել է 2018 թվականին, Աշոտ Բաղդասարյանի կողմից․</p>
        <p class="p_citat">Ռուսաստանի դաշնության քաղաքներից մեկում հյուրնկալվելիս, փորձեցի գտնել տվյալ քաղաքի հետաքրքիր վայրերը։
            Նկատեցի որ շատ քաղաքներ ունեն տեղեկատվական կայքեր և այդ ժամանակ հարցրեցի ինքս ինձ՜ իսկ ինչու իմ քաղաքը ևս չունենա։</p>
        <p class="p_h1 padding_head">Կայքի ստեղծման ընթացքը եղել է մոտ 8 ամիս․</p>
        <p class="p_citat">Ես մասնագիտությամբ նկարիչ եմ և այդ ժամանակ ընդհանրապես չէի տիրապետում ծռագրավորման լեզուներին։
        ԵՎ փորձում էի սովորել և միաժամանակ պատրաստել։ Որն էլ հիմնական աշխատանքիս հետ համադրելով շատ դժվար էր ստացվում։</p>
        <p class="p_h1 padding_head">Կայքը սկսեց գործել 2018թ հոկտեմբերից․</p>
        <p class="p_citat">Այդ ժամանակ կարծես մեծ բեռ ընկավ ուսերից, այն նպատակը որը դրել էի իմ առջև, վերջապես իրականացավ։</p>
        <p class="p_h1 padding_head">Կայքի թէ արտաքին տեսքը, թէ ֆունկցիոնալությունը պարբերաբար թարմացվում է․</p>
        <p class="p_citat">Կայքը սկզբնական շրջանում հարմարավետ չէր բջջային հեռախոսների համար, իսկ օգտվողների գրեթէ 90% օգտվում է հեռախոսներից։
            Ծռագրավորման լեզուներին ավելի լավ տիրապետելով 2019 թ-ին առաջին անգամ թարմացվեց, որն էլ հնարավորություն տվեց կայքից օգտվելու տարբեր սարքերից։</p>
        <p class="p_h1 padding_head">Եկրորդ մեծ թարմացումը տեղի ունեցավ 2021 թվականին << Խելացի Մասիս >> հիմնադրամի միջոցով․</p>
        <p class="p_citat">Այս թարմացումը լուծեց բազմաթիվ խնդիրներ, ներդրվեց խելացի ալգորիթմներ, որոնք սկսեցին անհատական մոտեցում ցուցաբերել օգտվողներին։
        Տնտեսվարողների համար ներդրվեց վարկանիշային սանդղակ։ ԵՎ այն հնարավորություն ընձեռնեց ավելի կատարելագործելու կայքը։</p>
        <p class="p_post padding_head">Այսօր կայքի ֆեյսբուքյան էջի հետևորդների քանակը հատում է 5000 սահմանը, որն էլ ավելի է պարտավորեցնում ինձ ավելի ու ավելի կատարելագործելու իմ կողմից Ձեզ համար պատրաստված այս կայքը։
            Միշտ ձեր հետ, միշտ ձեր կողքին Աշոտ Բաղդասարյան․․․</p>
        <div class="center">
            <a href="">
                <div class="float_left col_3 col_6_md divrandcolor bg_edit news_link">
                    <h2 class="padding_all"><i class="fas fa-piggy-bank"></i><br>ԿԱՏԱՐԵԼ ՆՎԻՐԱՏՎՈՒԹՅՈՒՆ</h2>
                </div>
            </a>
            <a href="">
                <div class="float_left col_3 col_6_md divrandcolor bg_delete news_link">
                    <h2 class="padding_all"><i class="fas fa-handshake"></i><br>ԴԱՌՆԱԼ ԳՈՐԾՆԿԵՐ</h2>
                </div>
            </a>
            <a href="">
                <div class="float_left col_3 col_6_md divrandcolor bg_n news_link">
                    <h2 class="padding_all"><i class="fas fa-ad"></i><br>ՏԵՂԱԴՐԵԼ ԳՈՎԱԶԴ</h2>
                </div>
            </a>
            <a href="{{ route('masisjan.contact') }}">
                <div class="float_left col_3 col_6_md divrandcolor bg_save news_link">
                    <h2 class="padding_all"><i class="fas fa-address-card"></i><br>ԿԱՊ ՄԵԶ ՀԵՏ</h2>
                </div>
            </a>
        </div>
    </div>
@endsection
