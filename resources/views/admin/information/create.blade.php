@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션 - Create</div>

                <div class="card-body">
                    <form action="{{ route('admin.information.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <div class="w-50 mr-1">
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">카테고리</p>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">
                                        카테고리 관리 메뉴에서 카테고리를 추가할 수 있습니다.
                                    </small>
                                    @error('category_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">주최자</p>
                                    <input class="form-control" type="text" name="organization" placeholder="주최자" value="{{ old('organization') }}">
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('organization')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">제목</p>
                                    <input class="form-control" type="text" name="title" placeholder="제목" value="{{ old('title') }}">
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
                                    <p class="font-weight-bold mb-0">대표사진</p>
                                    <input type="file" name="thumb" placeholder="썸네일">
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
                            <div class="w-50 ml-1">
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">링크</p>
                                    <input class="form-control" type="url" name="link" placeholder="외부링크" value="{{ old('link') }}">
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
                                    <p class="font-weight-bold mb-0">기간</p>
                                    <input class="form-control" type="date" name="start_date" placeholder="시작날짜" value="{{ old('start_date') }}">
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('start_date')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    ~
                                    <input class="form-control" type="date" name="end_date" placeholder="종료날짜" value="{{ old('end_date') }}">
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('end_date')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">운영 시간</p>
                                    <input class="form-control" type="time" name="start_time" placeholder="영업시작시간" value="{{ old('start_time') }}">
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('start_time')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    ~
                                    <input class="form-control" type="time" name="end_time" placeholder="영업종료시간" value="{{ old('end_time') }}">
                                    <small class="form-text text-muted">
                                        선택 항목입니다.
                                    </small>
                                    @error('end_time')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="만들기">
                            <a class="btn btn-secondary" href="{{ route('admin.information.index') }}">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
