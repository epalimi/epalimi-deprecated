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

    header .menu>a {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 0.3rem;
        margin: 0 1rem;
        text-decoration: none;
        color: #5e5e5e;
        font-size: 1rem;
        transition: all 0.4s;
        font-weight: bold;
    }

    header .menu>a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0);
        width: 0px;
        height: 4px;
        background-color: #fab23f;
        transition: all 0.2s;
    }

    header .menu>a:hover::after {
        width: 100%;
    }

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
<header class="shadow-sm">
    <div class="container">
        <nav class="d-flex">
            <a href="{{ url('/') }}">
                <img class="py-2 mr-3" src="{{ asset('svg/logo.svg') }}" style="width:100px;">
            </a>
            <div class="menu d-flex align-items-stretch mx-auto">
                <a href="#">동네소식</a>
                <a href="#">함께공모</a>
                <a href="#">단체소식</a>
                <a href="#">참여하기</a>
            </div>
        </nav>
    </div>
</header>

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
