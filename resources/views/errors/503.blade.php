@extends('errors::minimal')

@section('code', '503')
@section('message')
@if ($exception->getMessage())
{{ $exception->getMessage() }}
@else
서비스를 제공할 수 없습니다.<br>
(Service Unavailable)
@endif
@endsection
