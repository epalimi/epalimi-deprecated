@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션 - Show</div>

                <div class="card-body">
                    <p>제목: {{ $information->title }}</p>
                    <p>장소: {{ $information->location }}</p>
                    <p>대표사진: {{ $information->thumb }}</p>
                    <p>안내전화: {{ $information->phone }}</p>
                    <p>링크: {{ $information->link }}</p>
                    <p>기간-시작: {{ $information->start_date }}</p>
                    <p>기간-종료: {{ $information->end_date }}</p>
                    <p>운영시간-시작: {{ $information->start_time }}</p>
                    <p>운영시간-종료: {{ $information->end_time }}</p>
                    <p>카테고리: {{ $information->category->title }}</p>
                    <a class="btn btn-secondary w-100" href="{{ route('admin.information.edit', ['information' => $information->id]) }}">수정</a>
                    <a class="btn btn-secondary w-100" href="{{ route('admin.information.index') }}">목록</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
