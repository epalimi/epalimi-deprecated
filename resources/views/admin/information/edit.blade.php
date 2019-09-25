@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션 - Edit</div>

                <div class="card-body">
                    <form action="{{ route('admin.information.update', ['information' => $information->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            <div class="w-50 mr-1">
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">카테고리</p>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $information->category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">제목</p>
                                    <input class="form-control" type="text" name="title" placeholder="제목" value="{{ $information->title }}">
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">대표사진</p>
                                    <input type="file" name="thumb" placeholder="썸네일" value="{{ $information->thumb }}">
                                </div>
                            </div>
                            <div class="w-50 ml-1">
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">장소</p>
                                    <input class="form-control" type="text" name="location" placeholder="장소" value="{{ $information->location }}">
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">안내 전화</p>
                                    <input class="form-control" type="text" name="phone" placeholder="문의전화" value="{{ $information->phone }}">
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">링크</p>
                                    <input class="form-control" type="text" name="link" placeholder="외부링크" value="{{ $information->link }}">
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">기간</p>
                                    <input class="form-control" type="date" name="start_date" placeholder="시작날짜" value="{{ $information->start_date }}">
                                    ~
                                    <input class="form-control" type="date" name="end_date" placeholder="종료날짜" value="{{ $information->end_date }}">
                                </div>
                                <div class="mb-4">
                                    <p class="font-weight-bold mb-0">운영 시간</p>
                                    <input class="form-control" type="time" name="start_time" placeholder="영업시작시간" value="{{ $information->start_time }}">
                                    ~
                                    <input class="form-control" type="time" name="end_time" placeholder="영업종료시간" value="{{ $information->end_time }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="수정하기">
                            <a class="btn btn-secondary" href="{{ route('admin.information.show', ['information' => $information]) }}">취소</a>
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
