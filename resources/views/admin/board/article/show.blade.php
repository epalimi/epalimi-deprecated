@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">게시글 - Show</div>

                <div class="card-body">
                    <div class="d-flex">
                        <div class="w-50">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">게시판</p>
                                <span class="d-block">{{ $board->title }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">제목</p>
                                <span class="d-block">{{ $article->title }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">설명</p>
                                <span class="d-block">{{ $article->description }}</span>
                            </div>
                        </div>
                        <div class="w-50">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">외부 링크</p>
                                @if ($article->is_external)
                                <span class="d-block {{ $article->external_link == null ? 'text-danger' : '' }}">{{ data_get($article, 'external_link', '외부 리다이렉트가 활성화 되어있지만, 등록된 링크가 없습니다.') }}</span>
                                @else
                                <span class="d-block">외부 리다이렉트가 비활성화 상태입니다.</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">대표사진</p>
                                @if ($article->thumb == null)
                                <span>대표사진이 없습니다.</span>
                                @else
                                <img style="width:90%;" src="{{ url('storage'.$article->thumb) }}">
                                @endif
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">생성된 날짜</p>
                                <span>{{ data_get($article, 'created_at', 'NULL') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">마지막 업데이트</p>
                                <span>{{ data_get($article, 'updated_at', 'NULL') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group mx-auto d-flex" role="group">
                        <a class="btn btn-secondary" href="{{ route('admin.board.article.index', ['board' => $board]) }}">목록</a>
                        <a class="btn btn-secondary" href="{{ route('admin.board.article.edit', ['board' => $board, 'article' => $article]) }}">수정</a>
                        <a class="btn btn-secondary" href="#" style="cursor: pointer;" onclick="confirmFormSubmit('#deleteForm', '정말 삭제하시겠습니까?')">삭제</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
<form id="deleteForm" action="{{ route('admin.board.article.destroy', ['board' => $board, 'article' => $article]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection
