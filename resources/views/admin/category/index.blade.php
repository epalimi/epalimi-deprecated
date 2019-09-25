@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Index</div>

                <div class="card-body">
                    <table class="table table-hover border-bottom">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">고유 ID</th>
                                <th scope="col">이름</th>
                                <th scope="col">총 개수</th>
                                <th scope="col">바로가기</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="{{ route('admin.category.show', ['category' => $category]) }}">{{ $category->title }}</a>
                                </td>
                                <td>{{ $category->informations->count() }}</td>
                                <td>
                                    @if ($category->deletable)
                                    <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $category->id }}', '정말 삭제하시겠습니까?\n속한 인포메이션들 또한 모두 삭제됩니다.')">
                                        <img src="{{ asset('svg/delete.svg') }}" style="width:22px; height:22px;">
                                    </a>
                                    <form id="deleteForm{{ $category->id }}" class="d-none" action="{{ route('admin.category.destroy', ['category' => $category]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">카테고리가 없습니다!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                    <div class="d-flex">
                        <a class=" btn btn-secondary ml-auto" href="{{ route('admin.category.create') }}">새로 만들기</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
