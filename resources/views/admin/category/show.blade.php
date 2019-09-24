@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Show</div>

                <div class="card-body">
                    <p>카테고리 이름: {{ $category->title }}</p>
                    <ul class="list-group">
                        @foreach ($category->informations as $info)
                        <li class="list-group-item">
                            <a class="stretched-link d-block" href="{{ route('admin.information.show', ['information' => $info]) }}">
                                {{ $info->title }}
                            </a>
                            <span class="text-muted">{{ $info->location }} - {{ $info->phone }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a class="btn btn-dark w-100" href="{{ route('admin.category.edit', ['category' => $category->id]) }}">수정</a>
                    <a class="btn btn-dark w-100" href="{{ route('admin.category.index') }}">목록</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
