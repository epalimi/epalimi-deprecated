@extends('errors::minimal')

@section('code', '429')
@section('message')
너무 잦은 요청입니다.<br>
잠시 후 다시 시도해주세요.<br>
(Too Many Requests)
@endsection
