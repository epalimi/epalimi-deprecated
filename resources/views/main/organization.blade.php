@extends('layouts.common')

@push('styles')
<style>
    .tag-link {
        padding: .15rem;
        text-decoration: none;
        color: #969fa7;
    }

    .tag-link:hover {
        text-decoration: none;
        color: #747474;
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="head-titlem d-flex align-items-center">
                <span class="font-weight-bold" style="font-size: 1rem">단체 소개</span>
            </div>
            <hr>
            <ul class="nav">
                @foreach ($categories as $category)
                <li class="nav-item mr-3">
                    <a class="tag-link" href="#{{ $category->category }}">{{ $category->category }}</a>
                </li>
                @if (!($loop->last))
                <li class="nav-item mr-3">
                    <span style="color:#cdcdcd;">|</span>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @forelse ($categories as $category)
            <div id="{{ $category->category }}" class="row mt-5" style="margin-bottom: 5rem;">
                <div class="col-md-4 mb-3">
                    <div class="d-felx">
                        <div class="font-weight-bold text-center text-md-left" style="font-size: 2.5rem;">{{ $category->category }}</div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @foreach (App\Organization::where('category', $category->category)->get() as $organization)
                        <div class="col-md-6 col-lg-4 border-bottom border-right rounded">
                            <div class="organization d-flex align-items-center h-100 py-2 px-1">
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
