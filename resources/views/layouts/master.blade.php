<!doctype html>
<html lang="ko">

<head>
    {{-- 메타태그 --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF 토큰 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 구글 검색 최적화 meta --}}
    <meta name="description" content="은평행사, 참여리뷰, 은평소식, 은평지역정보, 주민서포터즈, 은평알리미, 지역정보플랫폼, 은평플랫폼">
    <meta name="keywords" content="은평정보플랫폼, 은평지역정보, 은평행사, 주민서포터즈, 은평알리미, 지역정보플랫폼, 은평플랫폼">
    <meta name="author" content="은평알리미"><!--작성자를 적자-->
    <meta name="google-site-verification" content="qXK1AHbIffrwCSHHv8W5c951ZhfTkHwX_7s5BTur6HU" />
    {{-- 오픈그래프 태그 (카카오톡, 페이스북) --}}
    <meta property="og:type" content="https://www.epalimi.com">
    <meta property="og:title" content="은평알리미">
    <meta property="og:description" content="은평정보플랫폼, 은평소식, 은평지역정보, 은평행사, 주민서포터즈, 은평알리미, 지역정보플랫폼, 은평플랫폼">
    <meta property="og:image" content="https://www.epalimi.com/images/epalimi.png">
    <meta property="og:url" content="https://www.epalimi.com/">
    {{-- 트위터 메타태그 --}}
    <meta name="twitter:card" content="은평행사, 참여리뷰, 은평지역정보, 은평소식, 주민서포터즈, 은평알리미, 은평플랫폼">
    <meta name="twitter:url" content="https://www.epalimi.com">
    <meta name="twitter:title" content="은평알리미">
    <meta name="twitter:description" content="은평정보플랫폼, 은평소식, 은평지역정보, 은평행사, 주민서포터즈, 은평알리미, 지역정보플랫폼, 은평플랫폼">
    <meta name="twitter:image" content="https://www.epalimi.com/images/epalimi.png">

    {{-- 타이틀 --}}
    <title>은평알리미</title>
    {{-- 웹폰트 --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- CSS 스타일 --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    {{-- Vue 컨테이너 --}}
    <div id="app">
        {{-- body 섹션 --}}
        @yield('body')
    </div>
    {{-- JS 스크립트 --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    {{-- 네이버 애널리틱스 --}}
    <script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script> <script type="text/javascript"> if(!wcs_add) var wcs_add = {}; wcs_add["wa"] = "fbffb230796048"; wcs_do(); </script>
    @stack('scripts')
</body>

</html>
