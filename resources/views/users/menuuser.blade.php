    <div class="width_350 icon_menu ">
        <a class="menu__item " href="{{ route('users.index') }}"><i class="fas fa-home" ></i> HOME</a>
        <a class="menu__item " href="{{ route('users.posts.index') }}"><i class="fas fa-newspaper" ></i> ՆՈՐՈՒԹՅՈՒՆՆԵՐ</a>
        <a class="menu__item " href="{{ route('users.events.index') }}"><i class="fas fa-calendar-day" ></i> ՄԻՋՈՑԱՌՈՒՄՆԵՐ</a>
        <a class="menu__item accordion" href="#"><i class="fas fa-cog" ></i> Api</a>
            <div class="margin_left_3 panel content">
                <a class="menu__item " href="{{ route('users.money.index') }}"><i class="fas fa-money-bill-alt" ></i> Money</a>
                <a class="menu__item " href="{{ route('users.menus.index') }}"><i class="fas fa-align-left" ></i> ՄԵՆՅՈՒ</a>
                <a class="menu__item " href="{{ route('users.words.index') }}"><i class="fas fa-warehouse" ></i> Home title</a>
            </div>
        <a class="menu__item " href="{{ route('users.all') }}"><i class="fas fa-circle" ></i> ԲՈԼՈՐԸ</a>
        <a class="menu__item accordion " href="#"><i class="fas fa-address-card" ></i> ԱՆՁՆԱԿԱՆ ԷՋ</a>
            <div class="margin_left_3 panel content">
                <a class="menu__item btn-logout" href="{{ route('logout', Auth::id()) }}"><i class="fas fa-sign-out-alt" ></i> ԴՈՒՐՍ ԳԱԼ</a>
            </div>
        <form id="form-logout" method="POST" style="display: none;">
            @csrf
            @method('POST')
        </form>
    </div>
