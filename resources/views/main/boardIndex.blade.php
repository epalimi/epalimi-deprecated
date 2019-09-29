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
        font-weight: bold;
        color: #484a51;
    }

    .board-link.board-actvie:hover {
        color: #484a51;
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="head-title">
                    <span class="font-weight-bold" style="font-size: 1.2rem;">게시판</span>
                </div>
                <hr>
                <ul class="nav mb-5">
                    <li class="nav-item mr-3">
                        <a class="board-link board-actvie" href="#">전체</a>
                    </li>
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @foreach (App\Board::all() as $nav)
                    <li class="nav-item mr-3">
                        <a class="board-link" href="{{ route('main.board', ['board' => $nav]) }}">{{ $nav->title }}</a>
                    </li>
                    @if (!($loop->last))
                    <li class="nav-item mr-3">
                        <span style="color:#cdcdcd;">|</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @foreach ($boards as $board)
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <div class="head-title d-flex align-items-center">
                            <span class="font-weight-bold">{{ $board->title }}</span>
                            <a class="ml-auto" href="{{ route('main.board', ['board' => $board]) }}">
                                <span class="text-muted" style="font-size: 0.8rem;">더보기 +</span>
                            </a>
                        </div>
                        <hr>
                        <div class="row">
                            @forelse ($board->articles()->take(4)->get() as $preview)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                @component('components.article', ['article' => $preview])
                                @endcomponent
                            </div>
                            @empty
                            <div class="col-12">
                                <span>빈 게시판입니다.</span>
                            </div>
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
