@extends('layouts.master')

@push('styles')
<style>
    /* html,
    body {
        position: relative;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    } */

    .navbar {
        padding: .6rem 1.25rem;
    }

    .footer-links a {
        text-decoration: none;
        color: inherit;
    }

    .footer-links a:hover {
        text-decoration: none;
        color: inherit;
    }

    main {
        min-height: 100vh;
    }

</style>
@endpush

@section('body')
{{-- 상단 네비게이션 바 --}}
<nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-sm">
    <div class="container">
        {{-- 브랜드 로고 --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            은평알리미
        </a>
        {{-- 메뉴 토글 버튼 --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContents">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- 네비게이션 컨텐츠 --}}
        <div id="navbarContents" class="collapse navbar-collapse">
            {{-- 오른쪽 아이템들 --}}
            <ul class="navbar-nav ml-auto">
                {{-- 카테고리 드랍다운 --}}
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        카테고리
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">카테고리 목록</h6>
                        @foreach (App\Category::all() as $category)
                        <a class="dropdown-item" href="{{ route('main.category', ['category' => $category]) }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </li>
                {{-- 게시판 드랍다운 --}}
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        게시판
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">게시판 목록</h6>
                        @foreach (App\Board::all() as $board)
                        <a class="dropdown-item" href="{{ route('main.board', ['board' => $board]) }}">{{ $board->title }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
            {{-- 검색 --}}
            {{-- (미구현) --}}
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="text-light p-4" style="background-color: #636363;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mt-2">
                <span style="font-size: 1rem;">은평알리미</span>
                <span>wwww.epalimi.com</span>
            </div>
            <div class="col-12 col-md-4 mt-2">
                <div class="footer-links">
                    <a class="mr-3" href="#">ABOUT</a>
                    <a class="mr-3" href="#">블로그</a>
                    <a href="#">제휴/문의</a>
                </div>
            </div>
            <div class="col-12 text-white-50 mt-2" style="font-size: 0.8rem;">
                주소: 서울시 은평구 통일로 6848동 50플러스서부캠퍼스 3층 / TEL: 010-2354-8202 / Kakaotalk: 은평알리미 / 이메일주소: gongricoop@gmail.com
            </div>
        </div>
    </div>
</footer>
@endsection
