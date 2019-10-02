@extends('errors::minimal')

@section('code', '403')
@section('message', $exception->getMessage() ?: '포비든 (Forbidden)')
