@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">배너 - Show</div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">순서</p>
                            <span class="d-block">{{ $banner->order }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">제목</p>
                            <span class="d-block">{!! nl2br(e($banner->title)) !!}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">설명</p>
                            <span class="d-block">{!! nl2br(e($banner->description)) !!}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">하단 설명</p>
                            <span class="d-block">{!! nl2br(e($banner->footer)) !!}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">링크</p>
                            <span class="d-block">{{ $banner->link }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight mb-0">이미지 (배경)</p>
                            @if ($banner->background != null)
                            <img class="img-fluid" src="{{ url('storage/'.$banner->background) }}">
                            @else
                            <span class="d-block">이미지가 없습니다.</span>
                            @endif
                        </div>
                    </div>
                    <div class="btn-group mx-auto d-flex" role="group">
                        <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}">목록</a>
                        <a class="btn btn-secondary" href="{{ route('admin.banner.edit', ['banner' => $banner]) }}">수정</a>
                        <a class="btn btn-secondary" href="#" style="cursor: pointer;" onclick="confirmFormSubmit('#deleteForm', '정말 삭제하시겠습니까?')">삭제</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
<form id="deleteForm" action="{{ route('admin.banner.destroy', ['banner' => $banner]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection
