@extends('layouts.master')

@push('styles')
<style>
    html,
    body,
    #app {
        height: 100vh;
    }

    .code,
    .message,
    .links {
        opacity: 1;
        transition: all 1s;
    }

    .closed {
        opacity: 0;
        top: -50px;
    }

</style>
@endpush

@push('scripts')
<script>
    $(function () {
        var code = $('.code');
        var message = $('.message');
        var links = $('.links');

        code.removeClass('closed');
        setTimeout(function () {
            message.removeClass('closed');
            setTimeout(function () {
                links.removeClass('closed');
            }, 400);
        }, 400);
    });
</script>
@endpush


@section('body')
<div class="d-flex flex-column justify-content-center align-items-center text-center p-3 h-100">
    <div class="code closed position-relative mb-2 font-weight-bold">
        <span style="font-size: 4rem; padding: 0 15px;">@yield('code')</span>
    </div>
    <div class="message closed position-relative mb-4 text-muted">
        <span>@yield('message')</span>
    </div>
    <div class="links closed position-relative d-flex">
        <a class="btn btn-outline-success" style="font-size:1.15rem;;" href="{{ url('/') }}">메인으로</a>
    </div>
</div>
@endsection
