@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Edit</div>

                <div class="card-body">
                    <form action="{{ route('admin.category.update', ['category' => $category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">이름</p>
                            <input class="form-control" type="text" name="title" placeholder="제목" value="{{ $category->title }}">
                            <small class="form-text text-muted">
                                필수 입력 항목입니다.
                            </small>
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="수정하기">
                            <a class="btn btn-secondary" href="{{ route('admin.category.show', ['category' => $category]) }}">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
