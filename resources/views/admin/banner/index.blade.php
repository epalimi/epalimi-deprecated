@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">배너 - Index</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover border-bottom">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">고유 ID</th>
                                    <th scope="col">순서</th>
                                    <th scope="col">제목</th>
                                    <th scope="col">바로가기</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banners as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->order }}</td>
                                    <td>
                                        <a href="{{ route('admin.banner.show', ['banner' => $banner]) }}">{{ $banner->title }}</a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="confirmFormSubmit('#deleteForm{{ $banner->id }}', '정말 삭제하시겠습니까?')">
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
                        <a class="btn btn-secondary ml-auto" href="{{ route('admin.banner.create') }}">배너 추가</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
@foreach ($banners as $banner)
<form id="deleteForm{{ $banner->id }}" action="{{ route('admin.banner.destroy', ['banner' => $banner]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endforeach
@endsection
