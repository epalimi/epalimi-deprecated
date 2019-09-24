@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Edit</div>

                <div class="card-body">
                    <form action="{{ route('admin.category.update', ['category' => $category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input class="form-control" type="text" name="title" placeholder="제목" value="{{ $category->title }}">
                        <input class="btn btn-dark w-100" type="submit" value="수정하기">
                        <a class="btn btn-dark w-100" href="{{ route('admin.category.show', ['category' => $category]) }}">취소</a>
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
