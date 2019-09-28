@extends('layouts.common')

@push('styles')
<style>
    .one-line {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
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
    <div id="datas" class="card-columns">
        @foreach ($articles as $article)
        <div class="card">
            <img class="card-img-top" src="{{ $article->thumb == null ? asset('svg/placeholder3x2.svg') : url('storage/'.$article->thumb) }}">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title">{{ $article->title }}</h4>
                <p class="card-text">{{ $article->description }}</p>
                <a href="#" class="btn btn-primary stretched-link mt-auto">자세히 보기</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>
@endsection
