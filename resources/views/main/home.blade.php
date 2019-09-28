@extends('layouts.common')

@push('styles')
<style>
    .one-line {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .multi-line {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        word-wrap: break-word;
    }

    .stretched-link::after {
        border-radius: 8px;
        transition: all 0.3s;
    }

    .stretched-link:hover::after {
        background-color: rgba(0, 0, 0, .02);
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    @foreach (App\Board::all() as $board)
    <div id="{{ $board->id }}" class="row mt-3">
        <div class="col-12">
            <h2 class="font-weight-bold" style="text-shadow: 1px 1px 10px #dfdfdf;">{{ $board->title }}</h2>
        </div>
    </div>
    <div class="row">
        @forelse ($board->articles as $article)
        <div class="col-sm-4 mt-3 p-2">
            <div class="embed-responsive embed-responsive-16by9 mb-4 border rounded shadow-sm" style="background-color: #ededed;">
                <img class="embed-responsive-item" style="object-fit: contain;" src="{{ $article->thumb != null ? url($article->thumb) : asset('svg/placeholder3x2.svg') }}">
            </div>
            <h4 class="one-line mb-3">{{ $article->title }}</h4>
            <p class="multi-line text-muted mb-auto">{{ $article->description }}</p>
            <hr class="w-100 my-3">
            <div class="d-flex">
                <a class="btn btn-outline-secondary stretched-link ml-auto" href="{{ $article->is_external ? $article->external_link : '#' }}" target="_blink">
                    {{ $article->is_external ? '외부 링크' : '자세히 보기' }}
                </a>
            </div>
        </div>
        @empty
        <div class="col-12 mt-3 p-2">
            <h6>게시판이 비어있습니다.</h3>
        </div>
        @endforelse
    </div>
    <hr class="w-100">
    @endforeach
</div>
@endsection
