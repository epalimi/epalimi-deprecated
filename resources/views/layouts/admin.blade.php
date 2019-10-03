@extends('layouts.master')

@section('body')
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.main') }}">
            은평공리 <span class="text-danger">관리자 콘솔</span>
        </a>
        <a class="navbar-brand text-muted font-weight-normal" href="{{ url('/') }}">메인으로</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="네이게이션 토글">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.category.index') }}">카테고리 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.information.index') }}">인포메이션 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.board.index') }}">게시판 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.organization.index') }}">단체 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.banner.index') }}">배너 관리</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">로그인</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                            로그아웃
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<div class="d-none">
    @yield('hidden')
</div>
@endsection
