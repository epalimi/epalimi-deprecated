@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">게시글 - Index</div>

                <div class="card-body">
                    <div class="font-weight-bold mb-2">게시판: {{ $board->title }}</div>
                    <div class="table-responsive-md">
                        <table class="table table-hover border-bottom">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">고유 ID</th>
                                    <th scope="col">제목</th>
                                    <th scope="col">바로가기</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.board.article.show', ['board' => $board, 'article' => $article]) }}">{{ $article->title }}</a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $article->id }}', '정말 삭제하시겠습니까?')">
                                            <img src="{{ asset('svg/delete.svg') }}" style="width:22px; height:22px;">
                                        </a>
                                        <form id="deleteForm{{ $article->id }}" class="d-none" action="{{ route('admin.board.article.destroy', ['board' => $board, 'article' => $article]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">게시글이 없습니다!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $articles->links() }}
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-secondary ml-auto" href="{{ route('admin.board.article.create', ['board' => $board]) }}">새로 만들기</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
