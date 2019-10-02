@extends('errors::minimal')

@section('code', '503')
@section('message', $exception->getMessage() ?: '서비스를 제공할 수 없습니다. (Service Unavailable)')
