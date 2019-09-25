@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">게시판 - Edit</div>

                <div class="card-body">
                    <form action="{{ route('admin.board.update', ['board' => $board]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">이름</p>
                            <input class="form-control" type="text" name="title" placeholder="제목" value="{{ $board->title }}">
                        </div>
                        <div class="btn-group mx-auto d-flex" role="group">
                            <input class="btn btn-secondary" type="submit" value="수정하기">
                            <a class="btn btn-secondary" href="{{ route('admin.board.show', ['board' => $board]) }}">취소</a>
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
