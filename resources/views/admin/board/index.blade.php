@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">게시판 - Index</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover border-bottom">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">고유 ID</th>
                                    <th scope="col">이름</th>
                                    <th scope="col">글 개수</th>
                                    <th scope="col">바로가기</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($boards as $board)
                                <tr>
                                    <td>{{ $board->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.board.show', ['board' => $board]) }}">{{ $board->title }}</a>
                                    </td>
                                    <td>{{ $board->articles->count() }}</td>
                                    <td>
                                        <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $board->id }}', '정말 삭제하시겠습니까?\n속한 게시글들 또한 모두 삭제됩니다.')">
                                            <img src="{{ asset('svg/delete.svg') }}" style="width:22px; height:22px;">
                                        </a>
                                        <form id="deleteForm{{ $board->id }}" class="d-none" action="{{ route('admin.board.destroy', ['board' => $board]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">게시판이 없습니다!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $boards->links() }}
                    </div>
                    <div class="d-flex">
                        <a class=" btn btn-secondary ml-auto" href="{{ route('admin.board.create') }}">새로 만들기</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
