@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-light">게시글 - Edit</div>

                <div class="card-body">
                    <form action="{{ route('admin.board.article.update', ['board' => $board, 'article' => $article]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            <div class="w-50 mr-1">
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">게시판</p>
                                    <div class="form-control border-0">{{ $board->title }}</div>
                                    <small class="form-text text-muted">
                                        게시판은 변경할 수 없습니다.
                                    </small>
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">제목</p>
                                    <input class="form-control" type="text" name="title" placeholder="제목" value="{{ $article->title }}">
                                    <small class="form-text text-muted">
                                        필수 입력 항목입니다.
                                    </small>
                                    @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">설명</p>
                                    <textarea class="form-control" name="description" placeholder="설명" rows="10">{{ $article->description }}</textarea>
                                    <small class="form-text text-muted">
                                        필수 입력 항목입니다.
                                    </small>
                                    @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-50 ml-1">
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">외부링크</p>
                                    <input id="is_external" type="checkbox" name="is_external" value="1" {{ $article->is_external ? 'checked' : '' }} onchange="toggleDisable('#external_link')">
                                    <label for="is_external">외부 리다이렉트</label>
                                    @error('is_external')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <input id="external_link" class="form-control" type="url" name="external_link" placeholder="외부링크" value="{{ $article->external_link }}" {{ $article->is_external ? '' : 'disabled' }}>
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('external_link')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">대표사진</p>
                                    <input type="file" name="thumb" placeholder="썸네일" value="{{ $article->thumb }}">
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('thumb')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="수정하기">
                            <a class="btn btn-secondary" href="{{ route('admin.board.article.show', ['board' => $board, 'article' => $article]) }}">취소</a>
                        </div>
                    </form>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    {{$error}}
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
