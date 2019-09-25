@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">게시판 - Show</div>

                <div class="card-body">

                    <div class="mb-4">
                        <p class="font-weight-bold mb-0">카테고리 이름</p>
                        <span class="d-block">{{ $board->title }}</span>
                    </div>

                    <div class="btn-group mx-auto d-flex" role="group">
                        <a class="btn btn-secondary" href="{{ route('admin.board.index') }}">목록</a>
                        <a class="btn btn-secondary" href="{{ route('admin.board.edit', ['board' => $board]) }}">수정</a>
                        <a class="btn btn-secondary" href="#" style="cursor: pointer;" onclick="confirmFormSubmit('#deleteForm', '정말 삭제하시겠습니까?\n속한 글들 또한 모두 삭제됩니다.')">삭제</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
<form id="deleteForm" action="{{ route('admin.board.destroy', ['board' => $board]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection
