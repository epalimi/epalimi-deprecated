@extends('layouts.common')

@section('content')
<div class="container py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="head-titlem d-flex align-items-center">
                <span class="font-weight-bold" style="font-size: 1rem">단체 소개</span>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @forelse ($categories as $category)
            <div class="row my-5">
                <div class="col-md-4 mb-3">
                    <div class="d-felx">
                        <span style="font-size: 2.5rem;">{{ $category->category }}</span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @foreach (App\Organization::where('category', $category->category)->get() as $organization)
                        <div class="col-md-6 col-lg-4 border-bottom border-right rounded">
                            <div class="organization d-flex py-2 px-1">
                                <span>{{ $organization->name }}</span>
                                @if ($organization->link != null)
                                <a class="d-flex justify-content-center align-items-center ml-auto" href="{{ $organization->link }}" target="_blank">
                                    <img src="{{ asset('svg/link.svg') }}" style="height:16px;">
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @empty
            <span>등록된 단체가 없습니다.</span>
            @endforelse
        </div>
    </div>
</div>
@endsection
