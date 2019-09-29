@extends('layouts.master')

@push('styles')
<style>
    /* 헤더 */
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

    header nav .menu {
        position: static;
        display: flex;
        align-items: stretch;
        margin: 0 auto;
    }

    .menu-toggle {
        display: none;
    }

    @media (max-width: 768px) {
        header nav .menu {
            position: absolute;
            flex-direction: column;
            top: calc(100% + 5px);
            max-height: 0;
            width: 94%;
            background-color: #f8f9fa;
            z-index: 1000;
            overflow: hidden;
            transition: all 0.4s;
        }

        header nav .menu.open {
            max-height: 200px;
            border: 1px solid #dee2e6;
        }

        header nav .menu.open a {
            padding: 0.5rem 1rem;
            margin: 0;
        }

        header nav .menu.open a:hover {
            background-color: rgba(0, 0, 0, .05);
        }

        header .menu>a:hover::after {
            display: none;
        }

        .menu-toggle {
            display: inline;
        }
    }

    /* 메인 */
    main {
        min-height: 100vh;
    }

    /* 푸터 */
    .footer-links a {
        text-decoration: none;
        color: inherit;
    }

    .footer-links a:hover {
        text-decoration: none;
        color: inherit;
    }

</style>
@endpush

@section('body')
{{-- 헤더 --}}
@include('includes.header')

{{-- 메인 --}}
<main>
    {{-- content 섹션 --}}
    @yield('content')
</main>

{{-- 푸터 --}}
@include('includes.footer')
@endsection
