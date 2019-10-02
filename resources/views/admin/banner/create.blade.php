@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-light">배너 - Create</div>

                <div class="card-body">
                    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">순서</p>
                                <input class="form-control" type="number" name="order" value="{{ old('order') }}">
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
                                <textarea class="form-control" name="title" rows="3" placeholder="제목">{{ old('title') }}</textarea>
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
                                <textarea class="form-control" name="description" rows="4" placeholder="설명">{{ old('description') }}</textarea>
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
                                <textarea class="form-control" name="footer" rows="3" placeholder="하단 설명">{{ old('footer') }}</textarea>
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
                            <input class="btn btn-secondary" type="submit" value="추가">
                            <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
