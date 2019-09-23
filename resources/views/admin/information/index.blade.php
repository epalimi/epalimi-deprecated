@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="btn btn-dark w-100" href="{{ route('admin.information.create') }}">새로 만들기</a>
                        </li>
                        @foreach ($informations as $info)
                        <li class="list-group-item">
                            <p>제목: {{ $info->title }}</p>
                            <p>장소: {{ $info->location }}</p>
                            <p>대표사진: {{ $info->thumb }}</p>
                            <p>안내전화: {{ $info->phone }}</p>
                            <p>링크: {{ $info->link }}</p>
                            <a class="btn btn-secondary w-100" href="{{ route('admin.information.show', ['information' => $info->id]) }}">상세보기</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
