@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Show</div>

                <div class="card-body">
                    <p>카테고리 이름: {{ $category->title }}</p>
                    <a class="btn btn-secondary w-100" href="{{ route('admin.category.edit', ['category' => $category->id]) }}">수정</a>
                    <a class="btn btn-secondary w-100" href="{{ route('admin.category.index') }}">목록</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
