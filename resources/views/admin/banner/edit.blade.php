@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-light">배너 - Edit</div>

                <div class="card-body">
                    <form action="{{ route('admin.banner.update', ['banner' => $banner]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">순서</p>
                                <input class="form-control" type="number" name="order" value="{{ $banner->order }}">
                                <small class="form-text text-muted">
                                    필수 입력 항목입니다.
                                </small>
                                @error('order')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">제목</p>
                                <textarea class="form-control" name="title" rows="3" placeholder="제목">{{ $banner->title }}</textarea>
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
                                <textarea class="form-control" name="description" rows="4" placeholder="설명">{{ $banner->description }}</textarea>
                                <small class="form-text text-muted">
                                    필수 입력 항목입니다.
                                </small>
                                @error('description')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">하단 설명</p>
                                <textarea class="form-control" name="footer" rows="3" placeholder="하단 설명">{{ $banner->footer }}</textarea>
                                <small class="form-text text-muted">
                                    선택 항목입니다.
                                </small>
                                @error('footer')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">링크</p>
                                <input class="form-control" type="text" name="link" placeholder="링크" value="{{ $banner->link }}">
                                <small class="form-text text-muted">
                                    선택 항목입니다.
                                </small>
                                @error('link')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">이미지 (배경)</p>
                                <input type="file" name="background" placeholder="이미지">
                                <small class="form-text text-muted">
                                    필수 항목입니다.
                                </small>
                                @error('background')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="수정하기">
                            <a class="btn btn-secondary" href="{{ route('admin.banner.show', ['banner' => $banner]) }}">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
