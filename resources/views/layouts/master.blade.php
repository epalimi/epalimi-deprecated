<!doctype html>
<html lang="ko">

<head>
    {{-- 메타태그 --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF 토큰 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- 타이틀 --}}
    <title>은평알리미</title>
    {{-- JS 스크립트 --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    @stack('scripts')
    {{-- 웹폰트 --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- CSS 스타일 --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div id="app">
        @yield('body')
    </div>
</body>

</html>
