@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션 - Index</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover border-bottom">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">고유 ID</th>
                                    <th scope="col">카테고리</th>
                                    <th scope="col">주최자</th>
                                    <th scope="col">제목</th>
                                    <th scope="col">바로가기</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($informations as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->category->title }}</td>
                                    <td>{{ $info->organization }}</td>
                                    <td>
                                        <a href="{{ route('admin.information.show', ['information' => $info]) }}">{{ $info->title }}</a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $info->id }}', '정말 삭제하시겠습니까?')">
                                            <img src="{{ asset('svg/delete.svg') }}" style="width:22px; height:22px;">
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">인포메이션이 없습니다!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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

@section('hidden')
@foreach ($informations as $info)
<form id="deleteForm{{ $info->id }}" action="{{ route('admin.information.destroy', ['information' => $info]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endforeach
@endsection
