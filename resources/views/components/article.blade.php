<div id="{{ $article->id }}" class="article h-100 d-flex flex-column">
    <div class="embed-responsive embed-responsive-4by3">
        <img class="embed-responsive-item" src="{{ $article->thumb != null ? url('storage/'.$article->thumb) : asset('svg/placeholder3x2.svg') }}" style="object-fit: cover;">
    </div>
    <div class="p-2 mb-3">
        <div class="board text-muted mt-3" style="font-size: 0.75rem;">{{ $article->board->title }}</div>
        <div class="title font-weight-bold mb-4" style="font-size: 1.1rem;">{{ $article->title }}</div>
        <div class="description text-muted" style="font-size:0.8rem;">
            {{ $article->description }}
        </div>
        @if ($article->is_external)
        <div class="external_link text-muted mt-3" style="font-size:0.8rem;">
            <span>외부 링크: </span>
            <span class="btn-link">{{ $article->external_link }}</span>
        </div>
        @endif
    </div>
    <a class="stretched-link" href="{{ $article->is_external ? $article->external_link : route('main.article', ['article' => $article->id]) }}" {{ $article->is_external ? 'target="_blank"' : '' }}></a>
    <hr class="w-100 mt-auto">
</div>
