<header class="shadow-sm">
    <div class="container position-relative">
        <nav class="d-flex">
            <a href="{{ url('/') }}">
                <img class="py-2 mr-3" src="{{ asset('svg/logo.svg') }}" style="width:100px;">
            </a>
            <a class="menu-toggle ml-auto" href="#" onclick="$('header .menu').toggleClass('open')">
                <img style="height:62px;" class="p-3" src="{{ asset('svg/menu.svg') }}">
            </a>
            <div class="menu rounded-bottom">
                <a href="{{ route('main.category.index') }}">동네소식</a>
                {{-- <a href="{{ route('main.category', ['category' => 7]) }}">함께공모</a> --}}
                <a href="{{ route('main.board.index') }}">이슈키워드</a>
            </div>
        </nav>
    </div>
</header>
