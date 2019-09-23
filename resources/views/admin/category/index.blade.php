@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="btn btn-dark w-100" href="{{ route('admin.category.create') }}">새로 만들기</a>
                        </li>
                        @foreach ($categories as $category)
                        <li class="list-group-item">
                            <p>카테고리 이름: {{ $category->title }}</p>
                            <a class="btn btn-secondary w-100" href="{{ route('admin.category.show', ['category' => $category->id]) }}">상세보기</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
