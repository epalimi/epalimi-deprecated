@extends('layouts.master')

@push('styles')
<style>
    .navbar {
        padding: .6rem 1.25rem;
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
                        <a class="dropdown-item" href="#">{{ $board->title }}</a>
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
@endsection
