@extends('layouts.common')

@push('styles')
<style>
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
            @component('components.categorynav', ['category' => $category])
            @endcomponent
            <div class="card-columns">
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
                            <span class="text-muted" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{ $information->organization }}</span>
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
