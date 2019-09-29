@extends('layouts.common')

@push('styles')
<style>
    * {
        color: rgba(255, 255, 255, .8);
    }

    img {
        opacity: 0.8;
    }

    a {
        font-size: 1rem;
        padding: 2px 10px;
        margin: 0 10px;
        text-decoration: none;
        color: rgba(220, 225, 230, 0.8);
    }

    a:hover {
        text-decoration: none;
        color: rgba(235, 240, 245, 0.8);
    }

    .background-video::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -50;
        background-color: rgba(0, 0, 0, .65);
    }

</style>
@endpush

@section('body')
<div class="position-relative d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="position-absolute" style="top:10px; right:15px">
        <a href="{{ route('main.home') }}">홈</a>
    </div>

    <div>
        <div class="d-flex justify-content-center align-items-center mb-4">
            <img src="{{ asset('svg/favicon.svg') }}" style="width:80px; height:80px;">
            <span class="font-weight-bold ml-3" style="font-size:2.5rem;">EP ALIMI</span>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('main.home') }}">홈</a>
            <a href="{{ route('main.category', ['category' => App\Category::first()]) }}">카테고리</a>
        </div>

        <div class="position-absolute" style="bottom:10px; left:15px;">
            <a href="{{ route('login') }}">관리자 로그인</a>
        </div>
    </div>

    <div class="background-video">
        <video class="position-absolute w-100 h-100" style="top:0; left:0; object-fit: cover; z-index: -100;" autoplay muted loop>
            <source src="{{ asset('videos/main_background.mp4') }}" type="video/mp4">
            video 태그가 지원되지 않는 브라우저입니다.
        </video>
    </div>
</div>
@endsection
