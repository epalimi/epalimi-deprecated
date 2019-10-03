@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">단체 - Show</div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">카테고리</p>
                            <span class="d-block">{{ $organization->category }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">이름</p>
                            <span class="d-block">{{ $organization->name }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="font-weight-bold mb-0">링크</p>
                            <span class="d-block">{{ $organization->link }}</span>
                        </div>
                    </div>
                    <div class="btn-group mx-auto d-flex" role="group">
                        <a class="btn btn-secondary" href="{{ route('admin.organization.index') }}">목록</a>
                        <a class="btn btn-secondary" href="{{ route('admin.organization.edit', ['organization' => $organization]) }}">수정</a>
                        <a class="btn btn-secondary" href="#" style="cursor: pointer;" onclick="confirmFormSubmit('#deleteForm', '정말 삭제하시겠습니까?')">삭제</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
<form id="deleteForm" action="{{ route('admin.organization.destroy', ['organization' => $organization]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection
