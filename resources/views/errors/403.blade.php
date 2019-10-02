@extends('errors::minimal')

@section('code', '403')
@section('message')
@if ($exception->getMessage())
{{ $exception->getMessage() }}
@else
페이지 접근이 거부되었습니다.<br>
(Forbidden)
@endif
@endsection
