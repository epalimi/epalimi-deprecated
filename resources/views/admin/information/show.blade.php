@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">인포메이션 - Show</div>

                <div class="card-body">
                    <div class="d-flex">
                        <div class="w-50">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">카테고리</p>
                                <span class="d-block">{{ $information->category->title }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">제목</p>
                                <span class="d-block">{{ $information->title }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">대표사진</p>
                                @if ($information->thumb == null)
                                <span>대표사진이 없습니다.</span>
                                @else
                                <img style="width:90%;" src="{{ url($information->thumb) }}">
                                @endif
                            </div>
                        </div>
                        <div class="w-50">
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">장소</p>
                                <span class="d-block">{{ data_get($information, 'location', '없음') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">안내 전화</p>
                                <span class="d-block">{{ data_get($information, 'phone', '없음') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">링크</p>
                                <span class="d-block">{{ data_get($information, 'link', '없음') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">기간</p>
                                <span>{{ data_get($information, 'start_date', '없음') }}</span>
                                ~
                                <span>{{ data_get($information, 'end_date', '없음') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="font-weight-bold mb-0">운영 시간</p>
                                <span>{{ data_get($information, 'start_time', '없음') }}</span>
                                ~
                                <span>{{ data_get($information, 'end_time', '없음') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group mx-auto d-flex" role="group">
                        <a class="btn btn-secondary" href="{{ route('admin.information.index') }}">목록</a>
                        <a class="btn btn-secondary" href="{{ route('admin.information.edit', ['information' => $information->id]) }}">수정</a>
                        <a class="btn btn-secondary" href="#" style="cursor: pointer;" onclick="confirmFormSubmit('#deleteForm', '정말 삭제하시겠습니까?')">삭제</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
<form id="deleteForm" action="{{ route('admin.information.destroy', ['information' => $information]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection
