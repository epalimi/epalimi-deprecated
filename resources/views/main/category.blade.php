@extends('layouts.common')

@push('styles')
<style>
    .category-link {
        padding: .1rem;
        text-decoration: none;
        color: #525252;
    }

    .category-link:hover {
        text-decoration: none;
        color: #747474;
    }

    .card-columns {
        column-count: 4;
    }

    .card {
        border-radius: 0;
        border: none;
        padding: 0;
    }

    .card .card-body {
        padding: 0;
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="head">
        <ul class="nav">
            @foreach (App\Category::all() as $nav)
            <li class="nav-item mr-3">
                <a class="category-link {{ $category->id == $nav->id ? 'font-weight-bold' : '' }}" href="{{ route('main.category', ['category' => $nav]) }}">{{ $nav->title }}</a>
            </li>
            @if (!($loop->last))
            <li class="nav-item mr-3">
                <span style="color:#cdcdcd;">|</span>
            </li>
            @endif
            @endforeach
        </ul>
        <hr class="mt-1">
        <div class="head-title">
            <span class="font-weight-bold">{{ $category->title }}</span>
        </div>
        <hr>
    </div>
    <div class="informations card-columns">
        @forelse ($informations as $information)
        <div class="card">
            <img class="card-img-top" src="{{ $information->thumb != null ? url('storage/'.$information->thumb) : asset('svg/placeholder3x2.svg') }}">
            <div class="card-body">
                <div class="duration p-3 text-white font-weight-bold" style="background-color: rgb(38, 73, 145);">
                    <span>{{ $information->start_date }}</span>
                    ~
                    <span>{{ $information->end_date }}</span>
                </div>
                <div class="p-3">
                    <span class="d-block mb-1" style="color:#9fa7ae; font-size:90%;">{{ $information->category->title }}</span>
                    <h4 class="font-weight-bold mb-0">{{ $information->title }}</h4>
                </div>
                <hr class="m-0">
                <div class="bottom px-3 py-2 d-flex" style="font-size:90%;">
                    <span class="text-muted">{{ $information->organization }}</span>
                    <span class="ml-auto">
                        <a class="review-link stretched-link" href="#">
                            <img src="{{ asset('svg/review.svg') }}" style="height:20px;">
                        </a>
                    </span>
                </div>
            </div>
        </div>
        @empty
        <h5>인포메이션이 없습니다.</h5>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{ $informations->links() }}
    </div>
</div>
@endsection
