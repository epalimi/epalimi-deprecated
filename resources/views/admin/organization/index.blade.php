@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">단체 - Index</div>

                <div class="card-body">
                    <div class="categories">
                        <div class="font-weight-bold">분류 모아보기</div>
                        <div class="d-flex mb-3">
                            @forelse ($categories as $category)
                            <span class="mr-3">{{ $category->category }}</span>
                            @empty
                            <span class="mr-3">없음</span>
                            @endforelse
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover border-bottom">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">고유 ID</th>
                                    <th scope="col">분류</th>
                                    <th scope="col">이름</th>
                                    <th scope="col">바로가기</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($organizations as $organization)
                                <tr>
                                    <td>{{ $organization->id }}</td>
                                    <td>{{ $organization->category }}</td>
                                    <td>
                                        <a href="{{ route('admin.organization.show', ['organization' => $organization]) }}">{{ $organization->name }}</a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $organization->id }}', '정말 삭제하시겠습니까?')">
                                            <img src="{{ asset('svg/delete.svg') }}" style="width:22px; height:22px;">
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">배너가 없습니다!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-secondary ml-auto" href="{{ route('admin.organization.create') }}">배너 추가</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
@foreach ($organizations as $organization)
<form id="deleteForm{{ $organization->id }}" action="{{ route('admin.organization.destroy', ['organization' => $organization]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endforeach
@endsection
