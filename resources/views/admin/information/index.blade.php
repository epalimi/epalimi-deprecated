@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션 - Index</div>

                <div class="card-body">
                    <table class="table table-hover border-bottom">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">고유 ID</th>
                                <th scope="col">카테고리</th>
                                <th scope="col">제목</th>
                                <th scope="col">바로가기</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($informations->count() > 0)
                            @foreach ($informations as $info)
                            <tr>
                                <td>{{ $info->id }}</td>
                                <td>{{ $info->category->title }}</td>
                                <td>
                                    <a href="{{ route('admin.information.show', ['information' => $info]) }}">{{ $info->title }}</a>
                                </td>
                                <td>
                                    <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $info->id }}', '정말 삭제하시겠습니까?')">
                                        <img src="{{ asset('svg/delete.svg') }}" style="width:22px; height:22px;">
                                    </a>
                                </td>
                                <form id="deleteForm{{ $info->id }}" class="d-none" action="{{ route('admin.information.destroy', ['information' => $info]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">인포메이션이 없습니다!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $informations->links() }}
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-secondary ml-auto" href="{{ route('admin.information.create') }}">새로 만들기</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
