@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-light">단체 - Create</div>

                <div class="card-body">
                    <div class="categories">
                        <div class="font-weight-bold">분류 모아보기</div>
                        <div class="d-flex mb-3">
                            @forelse ($categories as $category)
                            <span class="mr-3">{{ $category->category }}</span>
                            @empty
                            <span class="mr-3">없음</span>
                            @endforelse
                        </div>
                    </div>
                    <form action="{{ route('admin.organization.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">분류</p>
                                <input class="form-control" type="text" name="category" placeholder="분류" value="{{ old('category') }}">
                                <small class="form-text text-muted">
                                    필수 입력 항목입니다.
                                </small>
                                @error('category')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">이름</p>
                                <input class="form-control" type="text" name="name" placeholder="이름" value="{{ old('name') }}">
                                <small class="form-text text-muted">
                                    필수 입력 항목입니다.
                                </small>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">링크</p>
                                <input class="form-control" type="text" name="link" placeholder="링크" value="{{ old('link') }}">
                                <small class="form-text text-muted">
                                    선택 항목입니다.
                                </small>
                                @error('link')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="추가">
                            <a class="btn btn-secondary" href="{{ route('admin.organization.index') }}">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
