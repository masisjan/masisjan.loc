    <div class="width_350 icon_menu ">
        <a class="menu__item " href="{{ route('users.index') }}"><i class="fas fa-home" ></i> HOME</a>
        @if(auth()->user()->type == 'admin' || auth()->user()->type == 'userPlus')
        <a class="menu__item " href="{{ route('users.posts.index') }}"><i class="fas fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
        <a class="menu__item " href="{{ route('users.events.index') }}"><i class="fas fa-calendar-day" ></i> ՄԻՋՈՑԱՌՈՒՄՆԵՐ</a>
        @endif
        @if(auth()->user()->type == 'admin')
        <a class="menu__item accordion" href="#"><i class="fas fa-cog" ></i> Api</a>
            <div class="margin_left_3 panel content">
                <a class="menu__item " href="{{ route('users.money.index') }}"><i class="fas fa-money-bill-alt" ></i> Money</a>
                <a class="menu__item " href="{{ route('users.menus.index') }}"><i class="fas fa-align-left" ></i> ՄԵՆՅՈՒ</a>
                <a class="menu__item " href="{{ route('users.words.index') }}"><i class="fas fa-warehouse" ></i> Home title</a>
                <a class="menu__item " href="{{ route('users.places.index') }}"><i class="fas fa-map-marker-alt"></i> ՎԱՅՐԵՐ</a>
                <a class="menu__item " href="{{ route('users.allies.index') }}"><i class="fas fa-user-friends"></i> ԳՈՐԾՆԿԵՐՆԵՐ</a>
            </div>
        <a class="menu__item " href="{{ route('users.users.index', auth()->user()->id) }}"><i class="fas fa-users"></i> ՕԳՏԱՏԵՐԵՐ</a>
        @endif
        @if(auth()->user()->type == 'admin' || auth()->user()->type == 'partner')
        <a class="menu__item " href="{{ route('users.ads.index') }}"><i class="fas fa-ad"></i> ԳՈՎԱԶԴ</a>
        @endif
        <a class="menu__item " href="{{ route('users.all') }}"><i class="fas fa-plus-circle"></i> ԱՎԵԼԱՑՆԵԼ</a>
        <a class="menu__item accordion " href="#"><i class="fas fa-address-card" ></i> ԱՆՁՆԱԿԱՆ ԷՋ</a>
            <div class="margin_left_3 panel content">
                <a class="menu__item" href="{{ route('users.profile', auth()->user()->id) }}"><i class="fas fa-user-circle"></i> ՊՐՈՖԻԼ</a>
                <a class="menu__item" href="{{ route('users.setting') }}"><i class="fas fa-cog"></i> ԿԱՐԳԱՎՈՐՈՒՄՆԵՐ</a>
                <a class="menu__item btn-logout" href="{{ route('logout', Auth::id()) }}"><i class="fas fa-sign-out-alt" ></i> ԴՈՒՐՍ ԳԱԼ</a>
            </div>
        <form id="form-logout" method="POST" style="display: none;">
            @csrf
            @method('POST')
        </form>
    </div>
