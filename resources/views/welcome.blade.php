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
        background-color: rgba(0, 0, 0, .5);
    }

</style>
@endpush

@section('body')
<div class="position-relative d-flex justify-content-center align-items-center" style="height:100vh;">
    @if (Route::has('login'))
    <div class="position-absolute" style="top:10px; right:15px">
        @auth
        <a href="{{ url('/') }}">홈</a>
        @else
        <a href="{{ route('login') }}">로그인</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">회원가입</a>
        @endif
        @endauth
    </div>
    @endif

    <div>
        <div class="d-flex justify-content-center align-items-center mb-4">
            <img src="{{ asset('svg/favicon.svg') }}" style="width:80px; height:80px;">
            <span class="font-weight-bold ml-3" style="font-size:2.5rem;">EP Alimi</span>
        </div>

        <div>
            <a href="#">홈</a>
            @foreach (App\Category::all() as $category)
            <a href="#">{{ $category->title }}</a>
            @endforeach
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
