@extends('layouts.common')

@push('styles')
<style>
    .board-link {
        padding: .15rem;
        text-decoration: none;
        color: #969fa7;
    }

    .board-link:hover {
        text-decoration: none;
        color: #747474;
    }

    .board-link.board-actvie {
        /* border-bottom: 1px solid #484a51; */
        font-weight: bold;
        color: #484a51;
    }

    .board-link.board-actvie:hover {
        color: #484a51;
    }

    .article-detail {
        border-top: 2px solid lightgray;
        border-bottom: 2px solid lightgray;
    }

    .article-head {
        border-bottom: 1px solid lightgray;
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="head">
                <div class="head-title">
                    <span class="font-weight-bold" style="font-size: 1.2rem;">게시판</span>
                </div>
                <hr>
                <ul class="nav mb-5">
                    @foreach (App\Board::all() as $nav)
                    <li class="nav-item mr-3">
                        <a class="board-link {{ $article->board->id == $nav->id ? 'board-actvie' : '' }}" href="{{ route('main.board', ['board' => $nav]) }}">{{ $nav->title }}</a>
                    </li>
                    @if (!($loop->last))
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="article-detail pb-4 mb-5">
                <div class="article-head d-flex align-items-center px-4 py-2">
                    <span class="font-weight-bold" style="font-size: 1rem;">{{ $article->title }}</span>
                    <span class="ml-auto text-muted" style="font-size:0.8rem;">{{ $article->board->title }}</span>
                </div>
                <div class="article-content px-5 py-4">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ $article->thumb != null ? url('storage/'.$article->thumb) : asset('svg/placeholder3x2.svg') }}" style="max-width: 100%;">
                    </div>
                    <div>
                        {{ $article->description }}
                    </div>
                </div>
            </div>
            <div class="preview mt-5">
                <div class="head-title d-flex align-items-center">
                    <span class="font-weight-bold">게시판</span>
                    <a class="ml-auto" href="{{ route('main.board', ['board' => $article->board]) }}">
                        <span class="text-muted" style="font-size: 0.8rem;">더보기 +</span>
                    </a>
                </div>
                <hr>
                <div class="row">
                    @foreach ($previews as $preview)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        @component('components.article', ['article' => $preview])
                        @endcomponent
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
