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
                    <span class="font-weight-bold" style="font-size: 1.2rem;">게시판</span>
                </div>
                <hr>
                <ul class="nav mb-5">
                    @foreach (App\Board::all() as $nav)
                    <li class="nav-item mr-3">
                        <a class="board-link {{ $board->id == $nav->id ? 'board-actvie' : '' }}" href="{{ route('main.board', ['board' => $nav]) }}">{{ $nav->title }}</a>
                    </li>
                    @if (!($loop->last))
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    @component('components.article', ['article' => $article])
                    @endcomponent
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
