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
                <a href="#">함께공모</a>
                <a href="#">단체소식</a>
                <a href="https://pf.kakao.com/_dBuWj" target="_blank">참여하기</a>
            </div>
        </nav>
    </div>
</header>