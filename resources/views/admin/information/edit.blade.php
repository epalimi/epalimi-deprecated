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
                        <input class="form-control" type="text" name="title" placeholder="제목" value="{{ $information->title }}">
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $information->category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <input class="form-control" type="text" name="location" placeholder="장소" value="{{ $information->location }}">
                        <input class="form-control" type="file" name="thumb" placeholder="썸네일" value="{{ $information->thumb }}">
                        <input class="form-control" type="text" name="phone" placeholder="문의전화" value="{{ $information->phone }}">
                        <input class="form-control" type="text" name="link" placeholder="외부링크" value="{{ $information->link }}">
                        <input class="form-control" type="date" name="start_date" placeholder="시작날짜" value="{{ $information->start_date }}">
                        <input class="form-control" type="date" name="end_date" placeholder="종료날짜" value="{{ $information->end_date }}">
                        <input class="form-control" type="time" name="start_time" placeholder="영업시작시간" value="{{ $information->start_time }}">
                        <input class="form-control" type="time" name="end_time" placeholder="영업종료시간" value="{{ $information->end_time }}">
                        <input class="btn btn-dark w-100" type="submit" value="수정하기">
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
