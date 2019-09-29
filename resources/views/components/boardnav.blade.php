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

<div>
    <div class="head-title">
        <span class="font-weight-bold" style="font-size: 1.2rem;">게시판</span>
    </div>
    <hr>
    <ul class="nav mb-5">
        <li class="nav-item mr-3">
            <a class="board-link" href="{{ route('main.board.index') }}">전체</a>
        </li>
        <li class="nav-item mr-3">
            <span style="color:#cdcdcd;">|</span>
        </li>
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
