@extends('layouts.master')

@push('styles')
<style>
    html,
    body,
    #app {
        height: 100vh;
    }

    body {
        background-color: rgba(0, 0, 0, 0.75);
    }

    .code,
    .message,
    .links {
        opacity: 1;
        transition: all 1s;
    }

    .code {
        top: 0;
    }

    .message {
        left: 0;
    }

    .links {
        bottom: 0;
    }

    .background {
        position: absolute;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 100%;
        width: 100%;
        background: url('/images/error-background.jpg') center/cover no-repeat;
        z-index: -1;
        transition: all 2s;
    }

    .background::after {
        content: "";
        position: absolute;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.75);
    }

    .code.closed {
        opacity: 0;
        top: -25px;
    }

    .message.closed {
        opacity: 0;
        left: -25px;
    }

    .links.closed {
        opacity: 0;
        bottom: -25px;
    }

    .background.closed {
        opacity: 0;
    }

</style>
@endpush

@push('scripts')
<script>
    $(function () {
        var code = $('.code');
        var message = $('.message');
        var links = $('.links');
        var background = $('.background');

        code.removeClass('closed');
        setTimeout(function () {
            message.removeClass('closed');
            setTimeout(function () {
                links.removeClass('closed');
                setTimeout(function () {
                    background.removeClass('closed');
                }, 400);
            }, 400);
        }, 400);
    });
</script>
@endpush


@section('body')
<div class="text-light d-flex flex-column justify-content-center align-items-center text-center p-3 h-100">
    <div class="background closed">
    </div>
    <div class="code closed position-relative mb-2 font-weight-bold">
        <span style="font-size: 4rem; padding: 0 15px;">@yield('code')</span>
    </div>
    <div class="message closed position-relative mb-4 text-white-50">
        <span>@yield('message')</span>
    </div>
    <div class="links closed position-relative d-flex">
        <a class="btn btn-primary" style="font-size:1.15rem;;" href="{{ url('/') }}">메인으로</a>
    </div>
</div>
@endsection
