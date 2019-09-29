@extends('layouts.common')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            @component('components.boardnav', ['board' => $board])
            @endcomponent
            <div class="row">
                @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    @component('components.article', ['article' => $article])
                    @endcomponent
                </div>
                @empty
                <div class="col-12">
                    <span>빈 게시판입니다.</span>
                </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
