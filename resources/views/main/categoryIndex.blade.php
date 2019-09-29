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

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="head-title">
                    <span class="font-weight-bold" style="font-size: 1.2rem;">동네소식</span>
                </div>
                <hr>
                <ul class="nav mb-5">
                    <li class="nav-item mr-3">
                        <a class="category-link category-actvie" href="{{ route('main.category.index') }}">전체</a>
                    </li>
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @foreach (App\Category::all() as $nav)
                    <li class="nav-item mr-3">
                        <a class="category-link" href="{{ route('main.category', ['category' => $nav]) }}">{{ $nav->title }}</a>
                    </li>
                    @if (!($loop->last))
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @foreach ($categories as $category)
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <div class="head-title d-flex align-items-center">
                            <span class="font-weight-bold">{{ $category->title }}</span>
                            <a class="ml-auto" href="{{ route('main.category', ['category' => $category]) }}">
                                <span class="text-muted" style="font-size: 0.8rem;">더보기 +</span>
                            </a>
                        </div>
                        <hr>
                        <div class="card-columns col-12">
                            @forelse ($category->informations()->take(8)->get() as $information)
                            @component('components.information', ['information' => $information])
                            @endcomponent
                            @empty
                            <span>소식이 없습니다.</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
