@extends('layouts.common')

@push('styles')
<style>
    .category-link {
        padding: .15rem;
        text-decoration: none;
        color: #969fa7;
    }

    .category-link:hover {
        text-decoration: none;
        color: #747474;
    }

    .category-link.category-actvie {
        /* border-bottom: 1px solid #484a51; */
        font-weight: bold;
        color: #484a51;
    }

    .category-link.category-actvie:hover {
        color: #484a51;
    }

    .card-columns {
        column-count: 1;
    }

    @media (min-width: 576px) {
        .card-columns {
            column-count: 2;
        }
    }

    @media (min-width: 992px) {
        .card-columns {
            column-count: 3;
        }
    }

    @media (min-width: 1200px) {
        .card-columns {
            column-count: 4;
        }
    }

    .card {
        border-radius: 0;
        border: none;
        padding: 0;
        margin-bottom: 1.25rem !important;
    }

    .card .card-body {
        padding: 0;
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="head">
                <div class="head-title">
                    <span class="font-weight-bold" style="font-size: 1.2rem;">{{ $category->title }}</span>
                </div>
                <hr>
                <ul class="nav mb-5">
                    @foreach (App\Category::all() as $nav)
                    <li class="nav-item mr-3">
                        <a class="category-link {{ $category->id == $nav->id ? 'category-actvie' : '' }}" href="{{ route('main.category', ['category' => $nav]) }}">{{ $nav->title }}</a>
                    </li>
                    @if (!($loop->last))
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="informations card-columns">
                @forelse ($informations as $information)
                <div id="{{ $information->id }}" class="card rounded-top">
                    <img class="card-img-top" src="{{ $information->thumb != null ? url('storage/'.$information->thumb) : asset('svg/placeholder3x2.svg') }}">
                    <div class="card-body">
                        <div class="duration p-3 text-white font-weight-bold" style="background-color: rgb(38, 73, 145);">
                            <span>{{ $information->start_date != null ? $information->start_date->format('Y.m.d') : '없음' }}</span>
                            ~
                            <span>{{ $information->end_date != null ? $information->end_date->format('Y.m.d') : '없음' }}</span>
                        </div>
                        <div class="p-3">
                            <span class="d-block mb-1" style="color:#9fa7ae; font-size:90%;">{{ $information->category->title }}</span>
                            <h4 class="font-weight-bold mb-0" style="font-size: 1.1rem;">{{ $information->title }}</h4>
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
    </div>
</div>
@endsection
